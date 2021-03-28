green=`tput setaf 2`
yellow=`tput setaf 3`
reset=`tput sgr0`

kind create cluster

echo "${green}Setting up dashboard...${reset}"
helm repo add kubernetes-dashboard https://kubernetes.github.io/dashboard/
helm install dashboard kubernetes-dashboard/kubernetes-dashboard -n kubernetes-dashboard --create-namespace
kubectl apply -f srcs/service-account.yaml

echo "${green}Setting up metallb...${reset}"
kubectl apply -f https://raw.githubusercontent.com/metallb/metallb/v0.9.6/manifests/namespace.yaml
kubectl apply -f https://raw.githubusercontent.com/metallb/metallb/v0.9.6/manifests/metallb.yaml
kubectl create secret generic -n metallb-system memberlist --from-literal=secretkey="$(openssl rand -base64 128)"
NODEIP=`kubectl get nodes -o wide | grep 'kind-control-plane' | awk '{print $6}'`
IP1=`echo $NODEIP | cut -f1 -d "."`
IP2=`echo $NODEIP | cut -f2 -d "."`
IP3=`echo $NODEIP | cut -f3 -d "."`
METALLBRANGE="$IP1.$IP2.$IP3.220-$IP1.$IP2.$IP3.220"
echo "apiVersion: v1
kind: ConfigMap
metadata:
  namespace: metallb-system
  name: config
data:
  config: |
    address-pools:
    - name: default
      protocol: layer2
      addresses:
      - $METALLBRANGE" >> srcs/metallb.yaml
kubectl apply -f srcs/metallb.yaml

echo "${green}Building images...${reset}"
echo "${yellow}mysql${reset}"
docker build -t mysql-image /srcs/images/mysql

echo "${green}Loading images...${reset}"
echo "${yellow}mysql${reset}"
kind load docker-image mysql-image

echo "${green}Creating services...${reset}"
echo "${yellow}mysql${reset}"
kubectl apply -f /srcs/services/pv.yaml
kubectl apply -f /srcs/services/mysql.yaml

echo "${green}Your dashboard token:${reset}"
TOKENNAME=`kubectl describe serviceaccount admin-user -n kubernetes-dashboard | grep 'Tokens' | awk  '{print $2}'`
kubectl describe secret $TOKENNAME -n kubernetes-dashboard | grep 'token:' | awk  '{print $2}'

echo "${green}Lounching dashboard${reset}"
echo "Visit http://localhost:8001/api/v1/namespaces/kubernetes-dashboard/services/https:dashboard-kubernetes-dashboard:https/proxy/#/login"
kubectl proxy
TOKENNAME=`kubectl describe serviceaccount admin-user -n kubernetes-dashboard | grep 'Tokens' | awk  '{print $2}'`
kubectl describe secret $TOKENNAME -n kubernetes-dashboard | grep 'token:' | awk  '{print $2}'

# showmount

usefull when nfs is open.

```
111/tcp   open  rpcbind    2-4 (RPC #100000)
| rpcinfo:                
|   program version    port/proto  service                   
|   100000  2,3,4        111/tcp   rpcbind
|   100000  2,3,4        111/udp   rpcbind                   
|   100000  3,4          111/tcp6  rpcbind  
|   100000  3,4          111/udp6  rpcbind
|   100003  2,3,4       2049/tcp   nfs      
|   100003  2,3,4       2049/tcp6  nfs      
|   100003  2,3,4       2049/udp   nfs      
|   100003  2,3,4       2049/udp6  nfs      
|   100005  1,2,3      40412/udp   mountd
|   100005  1,2,3      51233/tcp6  mountd
|   100005  1,2,3      57722/tcp   mountd
|   100005  1,2,3      59004/udp6  mountd                        
|   100021  1,3,4      37539/tcp6  nlockmgr
|   100021  1,3,4      42654/udp   nlockmgr
|   100021  1,3,4      49656/udp6  nlockmgr                           
|   100021  1,3,4      54775/tcp   nlockmgr
|   100024  1          38568/tcp   status
|   100024  1          50138/udp   status        
|   100024  1          54698/udp6  status
|   100024  1          57281/tcp6  status
|   100227  2,3         2049/tcp   nfs_acl
|   100227  2,3         2049/tcp6  nfs_acl
|   100227  2,3         2049/udp   nfs_acl
|_  100227  2,3         2049/udp6  nfs_acl 
2049/tcp  open  nfs_acl    2-3 (RPC #100227)
```

```bash
showmount -e host
```
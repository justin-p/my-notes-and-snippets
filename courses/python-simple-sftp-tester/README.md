# python-simple-sftp-tester

Test upload to sftp with Python.

## Installation

copy .env-example to .env and enter info for sftp server.

run pip3 install -r requirements.txt

run sftp.py to verify if everything works.

## Never ending loop

run sftp-loop.py for never ending loop.

```
2019-11-04 14:04:54 INFO     [chan 0] Opened sftp connection (server version 3)
2019-11-04 14:04:54 INFO     Remote files: ['test.txt']
2019-11-04 14:04:54 INFO     Removing test.txt
2019-11-04 14:04:54 INFO     Remote files: []
2019-11-04 14:04:54 INFO     Uploading test.txt
2019-11-04 14:04:54 INFO     Remote files: ['test.txt']
2019-11-04 14:04:54 INFO     [chan 0] sftp session closed.
2019-11-04 14:05:04 INFO     Connected (version 2.0, client OpenSSH_7.5)
2019-11-04 14:05:04 INFO     Authentication (password) successful!
2019-11-04 14:05:04 INFO     Connection successfull
2019-11-04 14:05:05 INFO     [chan 0] Opened sftp connection (server version 3)
2019-11-04 14:05:05 INFO     Remote files: ['test.txt']
2019-11-04 14:05:05 INFO     Removing test.txt
2019-11-04 14:05:05 INFO     Remote files: []
2019-11-04 14:05:05 INFO     Uploading test.txt
2019-11-04 14:05:05 INFO     Remote files: ['test.txt']
2019-11-04 14:05:05 INFO     [chan 0] sftp session closed.
2019-11-04 14:05:15 INFO     Connected (version 2.0, client OpenSSH_7.5)
2019-11-04 14:05:15 INFO     Authentication (password) successful!
2019-11-04 14:05:15 INFO     Connection successfull
2019-11-04 14:05:16 INFO     [chan 0] Opened sftp connection (server version 3)
2019-11-04 14:05:16 INFO     Remote files: ['test.txt']
2019-11-04 14:05:16 INFO     Removing test.txt
2019-11-04 14:05:16 INFO     Remote files: []
2019-11-04 14:05:16 INFO     Uploading test.txt
2019-11-04 14:05:16 INFO     Remote files: ['test.txt']
2019-11-04 14:05:16 INFO     [chan 0] sftp session closed.
```

# TCP

Transmission Control Protocol (TCP) is one of the main protocols of the 'Internet protocol suite'.

TCP provides reliable, ordered, and error-checked delivery of a stream of octets (bytes) between applications running on hosts communicating via an IP network. Major internet applications such as the HTTP, SMTP, SSH, and SFTP rely on TCP. SSL/TLS often runs on top of TCP.

TCP is connection-oriented. A connection between client and server is established before data can be sent, this connection establisment is called the Three-way handshake.

Three-way handshake, retransmission, and error-detection adds to reliability but lengthens latency. Applications that do not require reliable data stream service may use the User Datagram Protocol (UDP), which provides a connectionless datagram service that prioritizes time over reliability.

TCP employs network congestion avoidance. However, there are vulnerabilities to TCP including denial of service, connection hijacking, TCP veto, and reset attack. For network security, monitoring, and debugging, TCP traffic can be intercepted and logged with a packet sniffer.

##  Three-way handshake

![handshake](https://www.inetdaemon.com/img/internet/3-way-handshake.gif)

| Steps |
| - |
|Host A sends a TCP SYNchronize packet to Host B |
|Host B receives A's SYN |
|Host B sends a SYNchronize-ACKnowledgement |
|Host A receives B's SYN-ACK |
|Host A sends ACKnowledge |
|Host B receives ACK. |
|TCP socket connection is ESTABLISHED. |

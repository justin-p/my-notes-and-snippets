# Layer 4

## UDP

User Datagram Protocol (UDP) is one of the core members of the 'Internet protocol suite'.

With UDP computer applications can send messages, in this case referred to as datagrams,to other hosts on an Internet Protocol (IP) network. Prior communications are not required in order to set up communication channels or data paths. UDP uses a simple connectionless communication model with a minimum of protocol mechanisms.  

UDP provides checksums for data integrity, and port numbers for addressing different functions at the source and destination of the datagram. It has no handshaking dialogues, and thus exposes the user's program to any unreliability of the underlying network; there is no guarantee of delivery, ordering, or duplicate protection, like there is with TCP.

## TCP

Transmission Control Protocol (TCP) is one of the main protocols of the 'Internet protocol suite'.

TCP provides reliable, ordered, and error-checked delivery of a stream of octets (bytes) between applications running on hosts communicating via an IP network. Major internet applications such as the HTTP, SMTP, SSH, and SFTP rely on TCP. SSL/TLS often runs on top of TCP.

TCP is connection-oriented. A connection between client and server is established before data can be sent, this connection establisment is called the Three-way handshake.

Three-way handshake, retransmission, and error-detection adds to reliability but lengthens latency. Applications that do not require reliable data stream service may use the User Datagram Protocol (UDP), which provides a connectionless datagram service that prioritizes time over reliability.

TCP employs network congestion avoidance. However, there are vulnerabilities to TCP including denial of service, connection hijacking, TCP veto, and reset attack. For network security, monitoring, and debugging, TCP traffic can be intercepted and logged with a packet sniffer.

###  Three-way handshake 


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

## TCP vs UDP

![tcpvsudp](https://camo.githubusercontent.com/331bc07b92b04155ec8482a1c8fa9aa796fdab7b/68747470733a2f2f7765622e617263686976652e6f72672f7765622f3230313730373036323031393336696d5f2f687474703a2f2f7465616d756c74696d6174652e696e2f77702d636f6e74656e742f75706c6f6164732f323031362f31322f544350372e6a7067)



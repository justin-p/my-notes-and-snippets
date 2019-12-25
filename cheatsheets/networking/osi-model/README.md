# OSI Model - Open Systems Interconnecting Model

Please Do Not Throw The Sausage Pizza Away


| Layer number | layer name      | Protocol data unit (PDU)       | What runs 'on it'            | Function of layer                                                                                                                               |
| ----------- |---------------- | ------------------------------ | ---------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------|
| 7           | Application     |                                | HTTP, SMTP                   | High-level APIs, including resource sharing, remote file access                                                                                 |
| 6           | Presentation    | Data                           | AVI, GIF ,JPEG, MKV          | Translation of data between a networking service and an application; including character encoding, data compression and encryption/decryption   |
| 5           | Session         |                                | Session management (sockets) | Managing communication sessions, i.e. continuous exchange of information in the form of multiple back-and-forth transmissions between two nodes |
| 4           | Transport	    | Segment (TCP) / Datagram (UDP) |                              | Reliable transmission of data segments between points on a network, including segmentation, acknowledgement and multiplexing                    |
| 3           | Network	        | Packet                         | IP addresses, Routing        | Structuring and managing a multi-node network, including addressing, routing and traffic control                                                |
| 2           | Data link	    | Frame                          | Switching, MAC addresses     | Reliable transmission of data frames between two nodes connected by a physical layer                                                            |
| 1           | Physical	    | Bit                            | Data cables, CAT5e, CAT6     | Transmission and reception of raw bit streams over a physical medium                                                                            |

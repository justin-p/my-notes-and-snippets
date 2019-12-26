# Layer 4

|                 | |
|-----------------|-|
| Num             | 4 |
| Name            | Transport |
| Acronim         | Throw |
| PDU             | Segment (TCP) / Datagram (UDP) |
| What is 'on it' | TCP, UDP |
| Function        | Reliable transmission of data segments between points on a network, including segmentation, acknowledgement and multiplexing |

Transport layer provides services to application layer and takes services from network layer. The data in the transport layer is referred to as Segments. It is responsible for the End to End delivery of the complete message. Transport layer also provides the acknowledgment of the successful data transmission and re-transmits the data if an error is found.

#### At senders side

Transport layer receives the formatted data from the upper layers, performs Segmentation and also implements Flow & Error control to ensure proper data transmission. It also adds Source and Destination port number in its header and forwards the segmented data to the Network Layer.

**Note: The sender needs to know the port number associated with the receiver’s application.**


Generally, this destination port number is configured, either by default or manually. For example, when a web application makes a request to a web server, it typically uses port number 80, because this is the default port assigned to web applications. Many applications have default port assigned.

#### At receives side

Transport Layer reads the port number from its header and forwards the Data which it has received to the respective application. It also performs sequencing and reassembling of the segmented data.

## Functions

The functions of the transport layer are :

- Segmentation and Reassembly: This layer accepts the message from the (session) layer, breaks the message into smaller units. Each of the segment produced has a header associated with it. The transport layer at the destination station reassembles the message.
- Service Point Addressing: In order to deliver the message to correct process, transport layer header includes a type of address called service point address or port address. Thus by specifying this address, transport layer makes sure that the message is delivered to the correct process.

The services provided by transport layer :

- Connection Oriented Service (TCP): It is a three-phase process which include
  - Connection Establishment
  - Data Transfer
  - Termination / disconnection
  In this type of transmission, the receiving device sends an acknowledgment, back to the source after a packet or group of packet is received. This type of transmission is reliable and secure.
- Connection less service (UDP): It is a one phase process and includes Data Transfer. In this type of transmission, the receiver does not acknowledge receipt of a packet. This approach allows for much faster communication between devices. Connection oriented Service is more reliable than connection less Service.

# Layer 2

|                 | |
|-----------------|-|
| Num             | 2 |
| Name            | Data link |
| Acronim         | Do |
| PDU             | Frame |
| What is 'on it' | NIC, Switch, Bridge |
| Function        |	Reliable transmission of data frames between two nodes connected by a physical layer |

The data link layer is responsible for the node to node delivery of the message. The main function of this layer is to make sure data transfer is error free from one node to another, over the physical layer. When a packet arrives in a network, it is the responsibility of the data link layer to transmit it to the Host using its MAC address.
Data Link Layer is divided into two sub layers :
 - Logical Link Control (LLC)
 - Media Access Control (MAC)

The packet received from Network layer (layer 3) is further divided into frames depending on the frame size of NIC (Network Interface Card). The data link layer also encapsulates Sender and Receiver's MAC address in the header.

The Receiver’s MAC address is obtained by placing an ARP(Address Resolution Protocol) request onto the wire asking "Who has that IP address?" and the destination host will reply with its MAC address.

The functions of the data Link layer are :

- Framing: Framing is a function of the data link layer. It provides a way for a sender to transmit a set of bits that are meaningful to the receiver. This can be accomplished by attaching special bit patterns to the beginning and end of the frame.
- Physical addressing: After creating frames, Data link layer adds physical addresses (MAC address) of sender and/or receiver in the header of each frame.
- Error control: Data link layer provides the mechanism of error control in which it detects and retransmits damaged or lost frames.
- Flow Control: The data rate must be constant on both sides else the data may get corrupted thus, flow control coordinates that amount of data that can be sent before receiving acknowledgement.
- Access control: When a single communication channel is shared by multiple devices, MAC sub-layer of data link layer helps to determine which device has control over the channel at a given time.

## MAC Addresses

First 3 pairs of MAC = Vendor.  

Also called OUI.

[OUI list](http://standards-oui.ieee.org/oui/oui.txt)  
[Online lookup - macvendors](https://macvendors.com/)  

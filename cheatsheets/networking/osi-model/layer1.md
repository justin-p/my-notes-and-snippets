# Layer 1


|                 | |
|-----------------|-|
| Num             |1|
| Name            |Physical Layer|
| Acronim         |Please|
| PDU             |Bit|
| What is 'on it' | Data cables (CAT5e, CAT6), Terminations (RJ45,SFP), Hub, Repeater, Modem |
| Function        |Transmission and reception of raw bit streams over a physical medium|

The lowest layer of the OSI reference model is the physical layer. It is responsible for the actual physical connection between the devices. The physical layer contains information in the form of bits. It is responsible for the actual physical connection between the devices. When receiving data, this layer will get the signal received and convert it into 0s and 1s and send them to the Data Link layer (layer 2), which will put the frame back together
|      |      |      |      |
| ---- | ---- | ---- | ---- |
| 0101 | 1001 | 0100 | 1110 |

The functions of the physical layer are :

- Bit synchronization: The physical layer provides the synchronization of the bits by providing a clock. This clock controls both sender and receiver thus providing synchronization at bit level.
- Bit rate control: The Physical layer also defines the transmission rate i.e. the number of bits sent per second.
- Physical topologies: Physical layer specifies the way in which the different, devices/nodes are arranged in a network i.e. bus, star or mesh topolgy.
- Transmission mode: Physical layer also defines the way in which the data flows between the two connected devices. The various transmission modes possible are: Simplex, half-duplex and full-duplex.

![physical_terminations](https://raw.githubusercontent.com/justin-p/my-notes-and-snippets/master/_files/IMG/physical_terminations-packetlife.png)

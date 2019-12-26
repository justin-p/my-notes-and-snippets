# Layer 5

|                 | |
|-----------------|-|
| Num             | 5 |
| Name            | Session |
| Acronim         | Sausage |
| PDU             | |
| What is 'on it' | Session management (sockets) |
| Function        | Managing communication sessions, i.e. continuous exchange of information in the form of multiple back-and-forth transmissions between two nodes |

This layer is responsible for establishment of connection, maintenance of sessions, authentication and also ensures security.
The functions of the session layer are:

- Session establishment, maintenance and termination: The layer allows the two processes to establish, use and terminate a connection.
- Synchronization: This layer allows a process to add checkpoints which are considered as synchronization points into the data. These synchronization point help to identify the error so that the data is re-synchronized properly, and ends of the messages are not cut prematurely and data loss is avoided.
- Dialog Controller: The session layer allows two systems to start communication with each other in half-duplex or full-duplex.

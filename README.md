## CSCI334 Software Design
This is an assignment for a software design subject. The goal of this project is to implement design patterns and refactoring techniques.

### Case Study
AdTech IT Consulting is a small IT solutions provider company located in Kuala Lumpur, Malaysia. The staff of 25 people consist of IT technician, project manager, designers, systems analysts, tester and programmers provides a range of computer hardware, and software solutions. AdTech IT works with clients to analyze their business needs. They then provide a packaged solution that often combines custom-built hardware, purchased software, and custom programming. In addition to the 6 IT technician, AdTech IT has 1 receptionist and 1 admin officer. As a small organization, AdTech IT Consulting is an informal and fun to work in organization and everyone knows each other well including its CEO Mr. Peter Lim.

The IT technician faces a lot of problem whereby work from clients is not being done in an optimum manner. Clients call and e-mail both to the receptionist and to the  individual IT technician whenever they have any kind of hardware or software problem. IT technician manage the requests that come directly to them. Sometimes Linda Toh, the receptionist, passes on requests that come through the general line. If the problem is complex it may require multiple trips, and the IT technician has to keep track of what he or she has done to try to fix the problem. Sometimes a second technician has to be dispatched, necessitating communication concerning the previous work. 

The CEO, Mr. Peter Lim wants to develop a system that is both more responsive to clients and helpful to IT technicians. He would like to see a system that allows clients to directly enter their service requests. The system would track the status of each request along with the hours spent for billing purposes. This system should also allows Mr. Choong, the project manager to allocate the task to the right IT technician based on the problem faced by the client. Any request that cannot be solve within 1 week would have to be alerted to Mr. Chong, the project manager to further action. This system should also help in calculating the overtime rate for IT technician that works after office hours to fix client problem. Generally IT technician are given $20 per hours for any work done after 6 p.m. Finally, Mr. Peter Lim also wants the system to be able to generate statistics and reports so he can pursue continuous improvement in this area and plan for manpower needs. For example, Mr. Peter Lim hopes also the system can create a summarized monthly report that shows the workload allocated to all its IT Technician together with the comments given by the client on the task done by the IT technician. 

#### Default user accounts
| User Type | username | password |
| ------ | ------ | ------ |
| CEO | 80001 | poopandpee |
| Project Manager | 80002 | poopandpee |
| Technician | 80003 | poopandpee |

The default database is hosted on [remotemysql](https://remotemysql.com/). Expect longer loading times.

You can find the local SQL file here: [adtech.sql](https://github.com/sooyongjie/adtech/blob/main/adtech.sql)

#### Screenshots
![Login](https://raw.githubusercontent.com/sooyongjie/adtech/main/screenshots/login.png)
![Client Dashboard](https://raw.githubusercontent.com/sooyongjie/adtech/main/screenshots/client_dashboard.png "Client Dashboard")
![Admin Dashboard](https://raw.githubusercontent.com/sooyongjie/adtech/main/screenshots/admin_dashboard.png "Admin Dashboard")

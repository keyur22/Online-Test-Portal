-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2016 at 01:31 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcqsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE IF NOT EXISTS `chapter` (
  `Chp_id` int(11) NOT NULL,
  `chapterName` varchar(100) NOT NULL,
  `Subj_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `common` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=545 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`Chp_id`, `chapterName`, `Subj_id`, `description`, `common`) VALUES
(1, 'Data Link Layer', 1, 'The data link layer or layer 2 is the second layer of the seven-layer OSI model of computer networking. This layer is the protocol layer that transfers data between adjacent network nodes in a wide area network (WAN) or between nodes on the same local area network (LAN) segment. The data link layer provides the functional and procedural means to transfer data between network entities and might provide the means to detect and possibly correct errors that may occur in the physical layer.', 1),
(2, 'Network Layer', 1, 'In the seven-layer OSI model of computer networking, the network layer is layer 3. The network layer is responsible for packet forwarding including routing through intermediate routers, since it knows the address of neighboring network nodes, and it also manages quality of service (QoS), and recognizes and forwards local host domain messages to the Transport layer (layer 4). The data link layer (layer 2) is responsible for media access control, flow control and error checking.', 1),
(3, 'System Analysis', 2, 'The act, process, or profession of studying an activity (as a procedure, a business, or a physiological function) typically by mathematical means in order to define its goals or purposes and to discover operations and procedures for accomplishing them most efficiently.', 1),
(4, 'Modeling System Requirements', 2, 'system modeling is the interdisciplinary study of the use of models to conceptualize and construct systems in business and IT development', 1),
(5, 'Divide and Conquer', 3, 'A divide and conquer algorithm works by recursively breaking down a problem into two or more sub-problems of the same (or related) type (divide), until these become simple enough to be solved directly (conquer).', 1),
(6, 'Greedy Method', 3, 'A greedy algorithm is a mathematical process that looks for simple, easy-to-implement solutions to complex, multi-step problems by deciding which next step will provide the most obvious benefit.', 0),
(7, 'Entity-Relationship Data Model', 4, 'An entity relationship model (ER model) is a data model for describing the data or information aspects of a business domain or its process requirements, in an abstract way that lends itself to ultimately being implemented in a database such as a relational database.', 1),
(8, 'Relational Model and Algebra', 4, 'In the relational model of a database, all data is represented in terms of tuples, grouped into relations.Relational algebra is a procedural query language, which takes instances of relations as input and yields instances of relations as output. It uses operators to perform queries. ', 1),
(9, 'Basics of Magnetism', 9, 'Magnetism is a class of physical phenomena that are mediated by magnetic fields. Electric currents and the magnetic moments of elementary particles give rise to a magnetic field, which acts on other currents and magnetic moments.', 1),
(10, 'Electro mechanical Energy Conversion', 9, 'Electromechanical energy conversion theory is the cornerstone for the analysis of electromechanical motion devices. The theory allows us to express the electromagnetic force or torque in terms of the device variables such as the currents and the displacement of the mechanical system.', 1),
(11, 'Definition and classification of signals and systems', 10, 'A signal is a function that maps a domain, often time or space, into a range, often a physical measure such as air pressure or light intensity. A system is a function that maps signals from its domain—its input signals—into signals in its range—its output signals.', 1),
(13, 'Three Phase Transformers- Construction & Phasor groups', 11, 'A three phase transformer can be constructed either by connecting together three single-phase transformers, thereby forming a so-called three phase transformer bank, or by using one pre-assembled and balanced three phase transformer which consists of three pairs of single phase windings mounted onto one single laminated core.', 1),
(14, 'Three Phase Transformers- Operation', 11, 'Ideal parallel operation between Transformers occurs when (1) there are no circulating currents on open circuit, and (2) the load division between the Transformers is proportional to their kVA ratings. These requirements necessitate that any - two or more three phase Transformers, which are desired to be operated in parallel, ', 1),
(15, 'Thyristors', 12, 'A thyristor is a solid-state semiconductor device with four layers of alternating N and P-type material. It acts exclusively as a bistable switch, conducting when the gate receives a current trigger, and continuing to conduct while the voltage across the device is not reversed (forward-biased).', 1),
(16, 'Controlled Rectifiers', 12, 'A Silicon-Controlled Rectifier, or SCR, is essentially a Shockley diode with an extra terminal added. This extra terminal is called the gate, and it is used to trigger the device into conduction (latch it) by the application of a small voltage.', 1),
(25, 'Transport Layer', 1, 'The transport layer is the layer in the open system interconnection (OSI) model responsible for end-to-end communication over a network. It provides logical communication between application processes running on different hosts within a layered architecture of protocols and other network components.\r\n', 1),
(26, 'Application Layer', 1, 'The application layer is a layer in the Open Systems Interconnection (OSI) seven-layer model and in the TCP/IP protocol suite. It consists of protocols that focus on process-to-process communication across an IP network and provides a firm communication interface and end-user services.', 1),
(27, 'Medium Access Control', 1, 'Media access control (MAC) is a sublayer of the data link layer (DLL) in the seven-layer OSI network reference model. MAC is responsible for the transmission of data packets to and from the network-interface card, and to and from another remotely shared channel.', 1),
(28, 'Routing protocols', 1, 'A routing protocol specifies how routers communicate with each other, disseminating information that enables them to select routes between any two nodes on a computer network. Routing algorithms determine the specific choice of route. Each router has a priori knowledge only of networks attached to it directly.', 1),
(29, 'Switching', 1, 'A network switch (also called switching hub, bridging hub, officially MAC bridge[1]) is a computer networking device that connects devices together on a computer network, by using packet switching to receive, process and forward data to the destination device. Unlike less advanced network hubs, a network switch forwards data only to one or multiple devices that need to receive it, rather than broadcasting the same data out of each of its ports.', 1),
(30, 'XML ', 19, 'Extensible Markup Language (XML) is a markup language that defines a set of rules for encoding documents in a format that is both human-readable and machine-readable.The design goals of XML emphasize simplicity, generality and usability across the Internet.', 1),
(31, 'Complex Variable & mapping', 20, 'Functions of a complex variable, Analytic functions, Cauchy-Riemann\nequations in Cartesian co-ordinates, Polar co-ordinates. Harmonic functions, Analytic method and Milne Thomson methods to\nfind f(z), Orthogonal trajectories.Conformal Mapping, Linear, Bilinear transformations, Cross ratio, fixed\npoints and standard transformation such as rotation and magnification,\ninvertion, translation.', 0),
(32, 'Laplace Transform ', 20, 'Introduction, Definition of Laplace transform, Laplace transform of\nconstant, trigonometrical, exponential functions. Important properties of Laplace transform. Unit step function, Heavi side function, Dirac-delta function, Periodic\nfunction and their Laplace transforms, Second shifting theorem. Inverse Laplace transform with Partial fraction and Convolution theorem. Application to solve initial and boundary value problem involving ordinary\ndifferential equations with one dependent variable and constant coefficients.', 0),
(33, 'Vector Algebra', 20, 'Vector Algebra:\nScalar and vector product of three and four Vectors and their properties. Vector Calculus: Vector differential operator , Gradient of a scalar point function,\nDiversions and Curl of Vector point function, vector integration, Gauss Diversion Theorem', 0),
(38, 'one', 80, 'common', 1),
(39, 'two', 80, 'not common', 1),
(40, 'three', 80, 'common', 1),
(41, 'four', 80, 'not common', 1),
(42, 'the chapter', 81, 'not common', 1),
(43, 'first', 82, 'ljljdslfkjlsjf', 1),
(44, 'second', 82, 'lkjdlfjdlkfj', 1),
(45, 'third', 82, 'ldkjfoeruo', 1),
(46, 'Symmetrical Fault Analysis', 73, 'Introduction to synchronous machine, basic construction and operation and equivalent circuit diagram , short circuit of synchronous machine: no load and loaded machine, transient on a transmission line, selection of Circuit breaker, short circuit MVA, algorithm for SC studies, Z Bus formulation, symmetrical fault analysis using Z bus (numerical on Z bus formulation upto 3x3 matrix).', 1),
(47, 'Unsymmetrical Fault Analysis', 73, 'Symmetrical component transformation, phase shift in star-delta transformers, sequence impedances and sequence network of transmission line, synchronous machine and transformer, power invariance, construction of sequence network of a power system. Fault analysis of unsymmetrical faults, single line to ground (SLG) fault, line to line (L-L) fault, double line to ground (LLG) fault, open conductor faults, bus impedance matrix method for analysis of unsymmetrical shunt faults.', 1),
(48, 'Power System Transients', 73, 'Review of transients in simple circuits, recovery transient due to removal of short circuit, arcing grounds, capacitance switching, current chopping phenomenon. Travelling waves on transmission lines, wave equation, reflection and refraction of waves, typical cases of line terminations, attenuation, Bewely lattice diagram. Lightning phenomenon, mechanism of Lightning stroke, shape of Lightning voltage wave, over voltages due to Lightning, Lightning protection problem, significance of tower footing resistance in relation to Lightning, insulator flashover and withstand voltages, protection against surges, surge arresters, surge capacitor, surge reactor and surge absorber, Lightning arrestors and protective characteristics, dynamic voltage rise and arrester rating.', 1),
(49, 'Insulation Coordination', 73, 'Volt time curve, over voltage protection, ground wires, insulation coordination based on lightning, surge protection of rotating machines and transformers', 1),
(50, 'Corona', 73, 'Phenomenon of corona, Disruptive critical voltage, Visual critical voltage, corona loss, factors affecting corona loss, Radio interference due to corona, practical considerations of corona loss, corona in bundled conductor lines, corona ring, corona pulses- their generation and properties in EHV lines, charge voltage (q-V) diagram and corona loss.\r\n', 1),
(51, 'Uncompensated Transmission Line', 73, 'Contains: Electrical Parameters, Fundamental Transmission Line equation, Surge Impedance and Natural Loading, the uncompensated line on Open circuit, the uncompensated line under load- Effect of line length, load power and power factor on voltage and reactive power, Maximum power and stability consideration.', 1),
(52, 'Synchronous Generator', 74, 'Construction, Emf induced in ac winding, winding factors, armature reaction, phasor diagram, OC and SC test, voltage regulation by EMF, MMF, ZPF, ASA, Saturated synchronous reactance method, power flow and maximum power conditions, parallel operation, effect of changing mechanical torque, effect of changing excitation, effect of excitation on alternator connected to infinite bus.', 1),
(53, 'Salient Pole Synchronous Generators', 74, 'Blondelâ€™s two reaction theory, power angle characteristics, synchronizing power and torque.', 1),
(54, 'Synchronous Motor', 74, 'Principle of operation, phasor diagram, power flow and maximum power conditions, excitation circles, power circles, V curves and O curves, power factor control (Effect of change in excitation on power factor), Hunting, Dampers, Starting methods, Starting against high torques, Measurement of Xd and Xq. ', 1),
(55, 'Theory of Synchronous Machine', 74, 'The ideal synchronous machine, synchronous machine Inductances, Transformation to Direct and Quadrature axis variables, Basic machine relations in dq0 variables, Steady state Analysis.', 1),
(56, 'Theory of Induction Machine', 74, 'The ideal Induction machine, Transformation to d-q variables, Basic machine relations in d-q variables, Steady state Analysis.', 1),
(57, 'Sequence Reactance of Synchronous Generator (Only for practical)', 74, 'Measurement of positive, negative and zero sequence reactance of Synchronous generator.', 1),
(58, 'Systems of Traction', 75, 'Diesel Traction, Electric Traction, Various systems of Track Electrification like DC, single phase, Three phase & Composite system. Train Movement & Energy Consumption-Typical Speed /Time Curves, Mechanics of Train Movement, Power & Energy output from the driving axles, Specific Energy consumption, Factors affecting Specific Energy consumption, Dead weight, Accelerating weight and Adhesive weight.', 1),
(59, 'Electric Traction Motors & Control', 75, 'Suitability of DC/AC motors for traction purpose, Starting & speed control by using rheostat method, series parallel method, Thyristor control method. Power supply for electric traction - Current collection systems and related overhead equipment, substations - location & Distribution System, substation equipment, Traction SCADA & Signaling.', 1),
(60, 'Illumination Engineering', 75, 'Basic terms in lighting systems, Laws of illumination, Polar curves, Photometry, Measurement of illumination, sources of light, study of different types of lamps ,types of luminaires , various factors related to luminaire selection, their control, and their features .Types of lighting systems, Recommended Illuminance levels for various tasks/activities/ locations.', 1),
(61, 'Electric Vehicle (EV) and Hybrid Electric Vehicles (HEV)', 75, 'Architectures of hybrid EV/HEV power system, Energy Sources for EV /HEV applications, Type of motors used in EV/HEV and their comparison.', 1),
(62, 'Other applications of Electrical Energy', 75, 'Terminology, Refrigeration cycle, Vapor compression type, vapor absorption type, Electrical circuit of a Refrigerator, Room Air conditioner window type & split type.\r\n', 1),
(63, 'Electric heating & Welding', 75, 'Basic working principle of Arc furnace, Induction furnace, Power supply requirement for furnaces, Electric welding equipment & power supply requirements.', 1),
(64, 'Introduction to control system', 76, 'History of control system, open loop and closed loop control system with examples, brief idea of multi variable control system.', 1),
(65, 'Modeling in the frequency domain', 76, 'Transfer function of electrical (Network and OP Amp) and electro mechanical systems. Transfer function model of AC & DC servomotor, potentiometer & tachogenerator. Block diagram reduction technique and signal flow graph, Masonâ€™s rule, Signal flow graph of electrical network.', 1),
(66, 'Modeling in the Time domain', 76, 'Introduction to state variable, General state space representation, State space representation of Electrical and Mechanical systems. Conversion between state space and transfer function. Alternative representations in state space: (Phase variable, parallel & cascade). Similarity transformations, diagonalizing a system matrix. Laplace Transform solution of state equation.', 1),
(67, 'Transient, Steady state and Stability analysis', 76, 'Time response analysis of first and second order systems, Under damped second order system with step input. System response with additional poles and zeros. Steady state error for unity feedback systems. Static error constants and system type. Concept of stability, absolute and relative stability using Routh Hurwitz criteria, stability in state space.', 1),
(68, 'Root locus techniques', 76, 'Definition and properties of root locus, rules for plotting root locus, stability analysis using root locus, Transient response design via gain adjustment.', 1),
(69, 'Frequency Response techniques', 76, 'Polar plots, Bode plot, stability in frequency domain, Nyquist plots. Nyquist stability criterion. Gain margin and phase margin via Nyquist diagram and Bode plots. Relationship between Closed loop transient, Closed and open loop frequency responses. Steady state error characteristics from frequency responses.', 1),
(70, 'Introduction to microcontroller', 77, 'Block diagram of generic microcontroller, Microcontroller versus microprocessor, Overview of the PIC 18 family, A brief history of PIC microcontroller, PIC 18 features and family, Internal bus structure of PIC microcontroller', 1),
(71, 'PIC Controller : PIC 18', 77, 'Block diagram PIC 18 microprocessor, PIC microcontroller program memory and data (File) memory organization, Special Function Register (SFR), General purpose Register (GPR), CPU registers, WREG register, Status register, BSR register, Instruction register, Program counter and program ROM, Stack pointer and Stack RAM, PIC 18 internal architecture (ALU, EEPROM, RAM, I/O port, Timer, CCP, DAC), Pipelining.', 1),
(72, 'PIC 18 Assembly language programming', 77, 'Instruction format, Addressing modes, Assembler directives, Assembly language programming structure, Instruction set, Reading writing data in programme memory, Arithmetic and logical instructions: Writing programs to perform arithmetic and logical computations, Rotate instructions: Writing program to perform divide and multiplication operations, Branch instruction, Subroutine and instructions associated with it, Stack and instruction associated with it, Time delays and delay calculations.', 1),
(73, 'PIC Programming in assembly and C', 77, 'Timer programming for generation of time delay : Timer register, control registers, interrupt register, 16 bit and 8 bit programming, Counter programming to count events: Serial port programming, Basics of serial communication, Synchronous and asynchronous communication, SPBRG, TXREG, RCREG, TXSTA,RCSTA,PIR1, Interrupt programming:, Interrupt versus polling, Interrupt structure, Enabling and disabling interrupt, Programming Timer interrupt, LCD and Keyboard interfacing.', 1),
(74, 'Parallel Ports ', 77, 'I/O Addressing, Synchronization. Overview of the PIC18 parallel ports, Interfacing with simple output devices.', 1),
(75, 'Input/ Output (I/O) port Interfacing', 77, 'Interfacing matrix keyboard and 7- segment LED display, ADC Interface, Stepper Motor Interface, Dc Motor interface, Interfacing an LCD (Liquid Crystal Display).', 1),
(76, 'Load Flow Studies', 78, 'Network model formulation, Y bus formation and singular matrix transformation. Load flow problem, Gauss Seidel (GS) methods. Newton Raphson methods (NR) (Polar, Rectangular form). Decoupled, Fast Decoupled load flow and comparison. Concept of DC loads flow.', 1),
(77, 'Economic System Operation', 78, 'Generator operating cost:- input-output, Heat rate and IFC curve, Constraints in operation, Coordinate equation, Exact coordinate equation, Bmn coefficients, transmission loss formula. Economic operation with limited fuel supply and shared generators, Economic exchange of power between the areas Optimal unit commitment and reliability considerations', 1),
(78, 'Automatic Generation and control', 78, 'Load frequency control problem, Thermal Governing system and transfer function. Steam Turbine and Power system transfer function. Isolated power system:- static and dynamic response PI and control implementation Two area load frequency control, static and dynamic response Frequency biased Tie line Bias control implementation and effect Implementation of AGC, AGC in restructured power system, under frequency load shedding, GRC, Dead band and its effect.', 1),
(79, 'Inter Change of Power and Energy', 78, 'Multiple utility interchange transaction, Other types of transactions, Power Pool.', 1),
(80, 'Power System Stability', 78, 'Types of Stability Study, Dynamics of synchronous machine, Power angle equation, Node elimination technique, Simple Systems, Steady state stability, Transient stability, Equal area criteria and its applications, Numerical solution of swing equation, Modified Eulerâ€™s method.', 1),
(81, 'Voltage stabilty', 78, 'Introduction, reactive power transmission, short circuit capacity, Problems of reactive power transmission, rotor angle stability and voltage stability, surge impedance loading, P-V and V- Q curve, various methods of voltage control â€“shunt and series compensation. Voltage Control- Tap changing transformers, Booster transformers, Static voltage compensators, Thyristorised series voltage injection', 1),
(82, 'Introduction to HVDC transmission', 79, 'Early discoveries and applications, , Limitation and advantages of AC and DC transmission, Economic factors, Classification of HVDC links,\r\nComponents HVDC Transmission system, Application of DC transmission, Ground Return Advantages and Problems', 1),
(83, 'Analysis of the Bridge rectifier', 79, 'Analysis of six pulse converter with grid control but no overlap, Current and phase relations, Analysis of six pulse converter with grid control and overlap less than 600, Relation between AC and DC quantities, Analysis with overlap greater than 600, Rectifier operation and inverter operation, Equivalent circuit of rectifier and inverter, Multi bridge converter, Numerical from converter circuits and multiple bridge converter', 1),
(84, 'Control', 79, 'Basic means of control, Limitation of manual control, Constant current verses constant voltage control, Desired features of control, Actual control characteristics, Significance of current margin, Power reversal, Alternative Inverter Control Mode.', 1),
(85, 'Converter Firing Control', 79, 'Control Implementation, Converter Firing Control Schemes', 1),
(86, 'Faults and protection', 79, 'Malfunction of mercury arc valves, By pass valves:- transfer of current from main valves to bypass valves and back to main valves (both rectifier and inverter), Commutation failure: causes and analysis, double\r\ncommutation failure, Protection against over current, over voltage, Surge arrester.', 1),
(87, 'Harmonics & Filters', 79, 'Characteristics Harmonics and Un-Characteristics Harmonics, Causes, Consequences, Trouble Caused by Harmonics, Means of Reducing Harmonics, Filters, AC & DC Filters.', 1),
(88, 'Introduction', 80, 'Introduction to machine design, Magnetic, Electrical, Conducting and Insulating materials used in machines', 1),
(89, 'Design of Single phase and Three phase transformers', 80, 'Review on construction and parts of transformer, Output equation, Main Dimensions, Specific electric and magnetic loadings, Design of core, Selection of the type of winding, Design of LV and HV windings, Design of insulation, ', 1),
(90, 'Performance measurement of Transformers:', 80, 'Resistance and leakage reactance of the winding, Mechanical forces, No load current; Cooling of transformers â€“ design of cooling tank and tubes/ radiators, IS: 1180, IS: 2026.', 1),
(91, 'Design of Three phase Induction motors', 80, 'Output equation, Choice of specific electric and magnetic loadings, Standard frames, Main dimensions, Design of stator and rotor windings, Stator and rotor slots, Design of stator core, air gap, Design of squirrel cage rotor, end rings, Design of wound rotor, Types of enclosures. ', 1),
(92, 'Performance measurement of three phase Induction motors', 80, 'Calculation of leakage reactance for parallel sided slot, Carterâ€™s coefficients, Concept of B60, Calculation of No load current, Short circuit current, Calculation of maximum output from Circle diagram, Dispersion coefficient, IS325, IS1231, IEC 60034. Design criteria of Energy efficient Induction motor.\r\n', 1),
(93, 'Design examples of Transformers and Induction Motors', 80, ' ', 1),
(94, 'Introduction to controllers and controllers Design', 81, 'Lag, lead and lead-lag network, cascade and feedback compensation and concept of Proportional, Integral and derivative controllers (all these with no numerical), design of gain compensation, lag, lead, lag-lead compensators through frequency response technique ( simple design problems).', 1),
(95, 'PID controllers', 81, 'Introduction to different form of PID controllers, textbook and industrial form, issues in implementation of industrial PID, and\r\nmodifications in the form of PID controllers, reverse acting controller. ', 1),
(96, 'Design Via state Space', 81, 'Introduction to controller design via gain adjustment, controllability, alternative approach to controller design, introduction to observer(estimator), observability, alternative approach to observer design, steady state error design via integral control.', 1),
(97, 'Digital control System', 81, 'introduction to digital control system, Modeling the digital computer, Pulse transfer function, Block diagram reduction, concept of stability in digital control system, Digital system stability via the s-plane (using Routh-Hurwitz) Steady state error, Transient response on Z plane (no numerical), cascade compensation via s-plane, implementation of digital compensator.', 1),
(98, 'Programmable Logic Controllers', 81, 'Introduction to PLC, Input output field devices, block diagram of PLC, input output module, power supply, programming unit, processing unit, rack assembly, memory unit, relay ladder logic circuit , addressing modes in PLC, relationship of data file to I/O module', 1),
(99, 'Fundamentals of PLC programming', 81, 'PLC program execution, ladder diagram programming language, instructions set of PLC, simple programs using these instructions, jump and loop instruction, shift instruction, troubleshooting PLC.', 1),
(100, 'Introduction to DMAES', 83, 'Types of electrical Projects, Types of electrical system, review of components of electrical system, different plans/ drawings in electrical system design, single line diagram in detail', 1),
(101, 'Design of Power Distribution System', 83, 'Different types of distribution systems and selection criteria, temporary and permanent power supply, electrical load size, L.F, D.F, future estimates, substation equipmentâ€™s options, design considerations in transformer selection, sizing and specifications, IS standards applicable in above design', 1),
(102, 'Design of Switchgear Protection and Auxiliary system', 83, 'Selection of HT/LT switchgears, metering, switchboards and MCC, protection systems, coordination and discrimination. Cables selection and sizing, cable installation and management systems, busbars design; Basics of selection of emergency/backup supplies, UPS, DG Set, Batteries; Preliminary design of interior lighting system. IS standards applicable in above designs', 1),
(103, 'Energy Monitoring and Targeting:', 83, 'Defining monitoring and targeting. Elements of monitoring and Targeting. Analysis techniques for energy optimization, Cumulative Sum of Differences (CUSUM). Electricity billing', 1),
(104, 'Energy Management of Electrical Systems:', 83, 'Electrical load management and maximum demand control, Power factor improvement and its benefit, selection and location of capacitors, distribution and transformer losses.', 1),
(105, 'Energy Audit:', 83, 'Introduction to Energy Conservation Act 2001 and ECBC 2007. Energy Audit: Definition,-need, Types of energy audit, Energy Management (audit) approach understanding energy costs, Bench marking, Maximizing system efficiencies,\r\noptimizing input energy requirement, fuel and energy substitution. Energy Audit instruments. ', 1),
(106, 'Electrical Energy Performance Assessment', 83, 'Motors And Variable Speed Drives, Lighting Systems. Basics of HVAC system assessment for electrical energy usage.', 1),
(107, 'Energy Efficient Technologies', 83, 'Maximum Demand controllers, Automatic Power Factor Controllers, Energy Efficient Motors, Soft starters, Variable Speed Drives, Energy Efficient Transformer. Energy saving potential of each technology', 1),
(108, 'Energy Efficient System Design', 83, 'Lighting System; Use of Energy Management system (EMS) and Building Management System (BMS).', 1),
(109, 'Electrical Drives: Introduction &Dynamics', 84, 'Introduction, Advantages of Electrical Drives, Parts of Electrical Drives, Choice of Electrical Drives, Status of DC and AC Drives, Fundamental Torque equations, Speed Torque conventions and Multi-quadrant Operation, Equivalent values of Drive Parameter, Measurement of Moment of Inertia, Components of Load Torques, Nature and Classification of Load Torques, Calculation of Time and Energy-Loss in Transient Operations, Steady State Stability, Load Equalization\r\n', 1),
(110, 'Selection of Motor Power Rating', 84, 'Thermal Model of Motor for Heating and Cooling, Classes of Motor\r\nRating, Determination of Motor Rating', 1),
(111, 'Control of Electrical Drives', 84, 'Modes of Operation, Speed Control, Drive Classification, Closed loop Control of Drives ', 1),
(112, 'DC Drives', 84, 'Review of Speed Torque relations for Shunt, Series and Separately excited Motors, Review of Starting, Braking (Regenerative, Dynamic, Plugging), Review of Speed control, Controlled rectifier fed DC drives (separately excited only): Single phase fully-controlled Rectifier, Single phase Half controlled Rectifier, Three phase fully-controlled Rectifier, Three phase Half-controlled Rectifier, Dual Converter Control, Chopper Control â€“ Motoring and Braking of separately excited and Series Motor.', 1),
(113, 'AC Drives', 84, 'Induction Motor drives, Review of Speed-Torque relations, Review of\r\nStarting methods, Braking (Regenerative, Plugging and AC dynamic\r\nbraking), Transient Analysis, Speed Control: Stator voltage control,\r\nVariable frequency control from voltage source, Static Rotor Resistance control, Slip Power Recovery - Static Scherbius Drive, Review of d-q model of Induction Motor, Principle of Vector Control, Block diagram of Direct Vector Control Scheme, Comparison of Scalar control and Vector control, Basic Principle of Direct Torque Control (block diagram) of induction motor. Introduction to Synchronous Motor Variable Speed drives. ', 1),
(114, 'Special Motor Drives', 84, 'Stepper Motor drives- Types, Torque vs. Stepping rate characteristics, Drive circuits, Introduction to Switched reluctance motor drives and\r\nBrushless DC motor drives.', 1),
(115, 'Load Forecasting', 85, 'Introduction, Classification of Load, Load Growth Characteristics, Peak Load Forecasting, Extrapolation and Co Relation methods of load Forecasting, Reactive Load Forecasting, Impact of weather on load forecasting.', 1),
(116, 'System Planning:', 85, 'Introduction to System Planning, Short, Medium and Long Term strategic planning, Reactive Power Planning. Introduction to Generation and Network Planning, D.C load flow equationIntroduction to Successive Expansion and Successive Backward methods', 1),
(117, 'Reliability of Systems', 85, 'Concepts, Terms and Definitions, Reliability models, Markov process, Reliability function, Hazard rate function, Bathtub Curve. Serial Configuration, Parallel Configuration, Mixed Configuration of systems, Minimal Cuts and Minimal Paths, Methods to find Minimal Cut Sets, System reliability using conditional probability method, cut set method and tie set method.', 1),
(118, 'Generating Capacity: Basic probability methods and Frequency & Duration method:', 85, 'Basic Probability Methods: Introduction, Generation system model, capacity outage probability table, recursive algorithm for rated and derated states, Evaluation of: loss of load indices, Loss of load expectation, Loss of energy. Frequency and Duration Method: Basic concepts, Numericals based on Frequency and Duration method.', 1),
(119, 'Operating Reserve', 85, 'General concept, PJM method, Modified PJM method', 1),
(120, 'Composite generation and transmission system', 85, 'Data requirement, Outages, system and load point indices, Application to simple system', 1),
(121, 'ReportÂ Writing', 86, 'ObjectivesÂ ofÂ reportÂ writing, LanguageÂ andÂ StyleÂ inÂ aÂ report, TypesÂ ofÂ reports, FormatsÂ ofÂ reports:Â Memo,Â letter,Â projectÂ andÂ surveyÂ based', 1),
(122, 'TechnicalÂ Proposals', 86, 'ObjectiveÂ ofÂ technicalÂ proposals,PartsÂ ofÂ proposal ', 1),
(123, 'IntroductionÂ toÂ InterpersonalÂ Skills', 86, 'EmotionalÂ Intelligence, Leadership, TeamÂ Building, Assertiveness, ConflictÂ Resolution, NegotiationÂ Skills, Motivation, TimeÂ Management', 1),
(124, 'MeetingsÂ andÂ Documentation', 86, ' StrategiesÂ forÂ conductingÂ effectiveÂ meetings, Notice, Agenda, MinutesÂ ofÂ theÂ meeting', 1),
(125, 'IntroductionÂ toÂ CorporateÂ EthicsÂ andÂ etiquettes', 86, 'BusinessÂ MeetingÂ etiquettes,Â InterviewÂ etiquettes,Â Professional\r\nandÂ workÂ etiquettes,Â SocialÂ skills, GreetingsÂ andÂ ArtÂ ofÂ Conversation, DressingÂ andÂ Grooming, DinningÂ etiquette, EthicalÂ codesÂ ofÂ conductÂ inÂ businessÂ andÂ corporateÂ activities', 1),
(126, 'EmploymentÂ Skills', 86, 'CoverÂ letter, Resume, GroupÂ Discussion, PresentationÂ Skills, InterviewÂ Skills', 1),
(127, 'Instrument Transformers', 70, 'Current Transformers - Introduction, Terms and Definitions, Accuracy class, Burden on CT, Vector diagram of CT, Magnetization curve of CT, Open circuited CT secondary, Polarity of CT and connections, Selection of CT for protection ratings, Types & construction, Multi wound CTs, Intermediate CTs, Transient behavior, Application for various protections.\r\nVoltage Transformers - Introduction, Theory of VT, Specifications for VT,\r\nTerms & definitions, Accuracy classes & uses, Burdens on VT, Connection\r\nof VTs, Residually connected VT, Electromagnetic VT, CVT & CVT as\r\ncoupling capacitor, Transient behavior of CVT, Application of CVT for protective relaying. ', 1),
(128, 'Substation Equipment', 70, 'Switching Devices and HRC Fuses & their applications', 1),
(129, 'Introduction to Protective relaying', 70, 'Introduction, Electromagnetic relays and Different Principles of protection', 1),
(130, 'Protection schemes provided for major apparatus', 70, 'Generators, Transformers and Induction Motors.', 1),
(131, 'Protection of Transmission Lines', 70, 'Feeder protection - Time grading, current grading , combined time & current\r\ngrading protection provided for Radial, Ring Main, Parallel, T-Feeder.\r\nBus Zone Protection - Differential protection provided for different types of\r\nbus zones.\r\nLV, MV, HV Transmission Lines - Protection provided by over current,\r\nearth fault, Differential and Stepped distance protection.\r\nEHV & UHV Transmission lines - Need for auto reclosure schemes, Carrier\r\naided distance protection (Directional comparison method), Power Line\r\nCarrier Current protection (Phase comparison method).\r\n', 1),
(132, 'Introduction to Static & Numerical Relays', 70, 'Advantages and Disadvantages, Revision and application of op-amps, logic\r\ngates, DSP, Signal sampling, Relays as comparators (Amplitude & phase),\r\nDistance relays as comparators.\r\n', 1),
(133, 'Three Phase Induction Motors-Introduction', 11, 'Construction, Principle of operation, Rotor frequency, Rotor emf, Current and Power, Induction motor phasor diagram, Analysis of Equivalent circuit,\r\nTorque-speed characteristics in braking, motoring and generating regions,\r\nEffect of voltage and frequency variations on Induction motor performance,\r\nLosses and efficiency, Power stages, No load and block rotor test, Circle\r\ndiagram, Applications of 3? IM', 1),
(134, 'Three Phase Induction Motors- Speed Control and Starting', 11, 'Speed control methods including V/f method (excluding Slip power recovery\r\nscheme), Starting methods, High torque motors, Cogging and crawling,\r\nBasic principle of Induction Generator', 1),
(135, 'Single phase Induction Motor-Introduction', 11, 'Principle of operation, Double field revolving theory, Equivalent circuit of\r\nsingle phase induction motor, Determination of equivalent circuit parameters from no load and block rotor test. ', 1),
(136, 'Single phase Induction Motor- Starting Methods', 11, 'Staring methods, Split phase starting- Resistance spilt phase, capacitor split\r\nphase, capacitor start and run, shaded pole starting, Reluctance starting.\r\nCalculation of capacitor at starting. Applications of 1? IM\r\n', 1),
(137, 'Vector Basics', 71, 'Introduction to Co-ordinate System - Rectangular - Cylindrical and\nSpherical Co-ordinate System - Introduction to line, Surface and Volume\nIntegrals - Definition of Curl, Divergence and Gradient .', 1),
(138, 'Static Electric Fields', 71, 'Coulomb''s Law in Vector Form - Definition of Electric Field Intensity -\nPrinciple of Superposition - Electric Field due to discrete charges, Electric\nfield due to continuous charge distribution - Electric Field due to line\ncharge - Electric Field on the axis of a uniformly charged circular disc -\nElectric Field due to an infinite uniformly charged sheet. Electric Scalar\nPotential - Relationship between potential and electric field - Potential due\nto infinite uniformly charged line - Potential due to electrical dipole -\nElectric Flux Density - Gauss Law\nIntroduce applications of electrostatic fields - electrostatic discharge, high\ndielectric constant material', 1),
(139, 'Static Magnetic Fields', 71, 'The Biot-Savart''s Law in vector form - Magnetic Field intensity due to a\nfinite and infinite wire carrying a current I - Magnetic field intensity on the\naxis of a circular and rectangular loop carrying a current I - Ampere''s\ncircuital law and simple applications. Magnetic flux density - The Lorentz\nforce equation for a moving charge and applications - Force on a wire\ncarrying a current I placed in a magnetic field - Torque on a loop carrying a\ncurrent I - Magnetic moment - Magnetic Vector Potential. ', 1),
(140, 'Electric and Magnetic Fields in Materials', 71, 'Poisson''s and Laplace''s equation - Electric Polarization-Nature of dielectric\nmaterials- Definition of Capacitance - Capacitance of various geometries\nusing Laplace''s equation - Electrostatic energy and energy density -\nBoundary conditions for electric fields - Electric current - Current density -\npoint form of ohm''s law - continuity equation for current. Definition of\nInductance - Inductance of loops and solenoids - Definition of mutual\ninductance - simple examples. Energy density in magnetic fields - magnetic\nboundary conditions. Estimation and control of electric stress- control of\nstress at an electrode edge.', 1),
(141, 'Time varying Electric and Magnetic Fields', 71, 'Faraday''s law - Maxwell''s Second Equation in integral form from Faraday''s Law - Equation expressed in point form. Displacement current - Ampere''s circuital law in integral form - Modified form of Ampere''s circuital law as Maxwell''s first equation in integral form - Equation expressed in point form. Maxwell''s four equations in integral form and differential form', 1),
(142, 'Wave theory', 71, 'Derivation of Wave Equation - Uniform Plane Waves - Maxwell''s equation\nin phasor form, Wave equation in Phasor form - Plane waves in free space\nand in a homogenous material. Wave equation for a conducting medium,\nplane waves in lossy dielectrics, propagation in good conductors.', 1),
(143, 'Other power semiconductor devices', 12, 'Basic operation and characteristics of power diodes, power BJTs, power\r\nMOSFETs, IGBTs, Comparison of devices, applications, need for driver\r\ncircuits and snubber circuits, heat sinks.', 1),
(144, 'Inverter', 12, 'Principle of operation, Performance parameters, Single phase voltage source\nbridge Inverters, Three phase VSI (120\nand 180\nconduction mode), control\nof inverter output voltage , PWM techniques-Single PWM, Multiple PWM,\nSinusoidal PWM, Introduction to Space vector modulation, Current source\ninverters, comparison of VSI and CSI, Applications.\n', 1),
(145, 'DC to DC Converter', 12, 'Basic principle of dc to dc conversion, switching mode regulators - Buck,\nBoost, Buck-Boost, Cuk regulators, concept of bidirectional dc to dc\nconverters, all with resistive load and only CCM mode, Applications,\nNumerical included', 1),
(146, 'AC voltage controllers', 12, 'On-Off and phase control, Single phase AC voltage controllers with R and\r\nRL loads.\r\nCyclo converters, Matrix converter: Basic working principle.\r\n', 1),
(147, 'Introduction to CE', 72, 'Types of signals, Signal spectrum and band width, Fourier Series, Fourier\r\nTransform, Analog and Digital communication system (block diagram).', 1),
(148, 'Analog Communication', 72, 'Analog Modulation Demodulation Techniques (AM, FM & PM),\r\nAmplitude Modulation (AM) - DSBFC, DSBSC, SSB generation,\r\nFrequency Modulation (FM) - Noise Triangle, Pre-emphasis and Deemphasis,\r\ngeneration Techniques, Phase Modulation (PM) - Generation\r\nTechniques, Radio Receivers, TRF and Superhyterodyne Receivers, AGC\r\nMethods, FM Receivers.', 1),
(149, 'Information Theory', 72, 'Concept of information, Entropy of discrete system, Transmission rate\nand channel capacity of noisy channels, Shannon''s theorem on channel\ncapacity, sampling theorem, Source encoding: Shannon - Fano algorithm,\nHuffman technique.', 1),
(150, 'Digital Communication', 72, 'PCM, Delta Modulation and Adaptive delta modulation, ASK, FSK, PSKBPSK,\r\nDPSK (Transmitter Receiver block diagram, Waveforms,\r\nSpectrum)', 1),
(151, 'Coding Techniques (Algorithmic Approach)', 72, 'Linear block codes (coding and decoding), Cyclic codes (generation),\r\nConvolution codes (generation only, state diagram and code tree not\r\nincluded)', 1),
(152, 'Overview of different types of communication', 72, 'Power Line Carrier communication, Satellite communication, OFC', 1),
(153, 'Diode', 61, 'Construction Principle of operation and application of special\ndiode - 1) Zener, 2) LED, 3) Schottky, 4) Photodoide.\nFull Wave Rectifier and Filter Analysis: specification of the\ndevices and components required for C, LC, CLC & RC filter.', 1),
(154, 'Bipolar Junction Transistor', 61, 'Biasing Circuits: Types, dc circuit analysis, load line, thermal\r\nrunaway, stability factor analysis, thermal stabilization and\r\ncompensation.\r\nModeling: Small signal analysis of CE configurations with\r\ndifferent biasing network using h-parameter model. Introduction\r\nto re-model and hybrid-pi model.\r\nAmplification. Derivation of expression for voltage gain, current\r\ngain, input impedance and output impedance of CC, CB, CE\r\namplifiers, Study of frequency response of BJT amplifier.', 1),
(155, 'Field Effect Transistor: JFET and MOSFET', 61, 'Types, construction and their characteristics, Biasing circuits for\r\nFET amplifiers, FET small signal analysis, derivation of\r\nexpressions for voltage gain and output impedance of CS\r\namplifiers.\r\nMOSFET- Types, construction and their characteristics ', 1),
(156, 'Feedback Amplifier & Cascade amplifiers', 61, 'Introduction to positive and negative feedback, negative\nfeedback -current, voltage, Series and Shunt type. It''s effect on\ninput impedance, output impedance, voltage gain, current gain\nand bandwidth, Types of coupling, effect of coupling on performance of BJT\nand JFET amplifiers, cascade connection, Darlington-pair', 1),
(157, 'DC and AC analysis of Differential amplifier', 61, 'single and dual\r\ninputs and balanced and unbalanced outputs using BJT. FET\r\ndifferential amplifier. ', 1),
(158, 'Oscillators', 61, ' Positive feedback oscillators, frequency of oscillation and\r\ncondition for sustained oscillations of a) RC phase shift, b)Wien\r\nbridge, c)Hartley/ Colpitts with derivations, crystal Oscillator,\r\nUJT relaxation oscillator ', 1),
(159, 'Conventional and Non- Conventional sources of energy & Economics of the power plant', 62, 'Present energy scenario world wide and Indian perspective. Load curve, load duration curve, various factors and effects of\r\nfluctuating load on operation and methods of meeting fluctuating\r\nload. Selection of generating equipment, load sharing cost of\r\nelectrical energy, basic tariff methods(numericals)', 1),
(160, 'Thermal power plant', 62, 'Law of Thermodynamics. Analysis of steam cycle-Carnot,\r\nRankine, Reheat cycle and Regenerative cycle.\r\nLayout of power plant Lay out of pulverized coal burners,\r\nfluidized bed combustion, coal handling systems, ash handling\r\nsystems. Forced draught and induced draught fans, boiler feed\r\npumps, super heater regenerators, condensers, boilers, deaerators\r\nand cooling towers. ', 1),
(161, 'Hydro power plant', 62, 'Rainfall, run off and its measurement hydrograph, flow\r\nduration curve, reservoir storage capacity, classification of\r\nplants-run off river plant, storage river plant, pumped storage\r\nplant, layout of hydroelectric power plant, turbine-pelton,\r\nKaplan, Francis(Francis)', 1),
(162, 'Nuclear power plant', 62, 'Introduction of nuclear engineering, fission, fusion, nuclear\r\nmaterial, thermal fission reactor and power plant - PWR BWR ,\r\nliquid metal fast breeder, reactors, reactor control, introduction\r\nto plasma technology. ', 1),
(163, 'Diesel and gas turbine power plant', 62, 'General layout, Advantages and disadvantages, component,\r\nperformance of gas turbine power plant, combined heat power\r\ngeneration', 1),
(164, 'Power Generation using non conventional energy sources.', 62, 'Solar Energy, Wind Energy, Fuel Cell and introduction to other sources.', 1),
(165, 'Network Theorems', 63, 'Solution of network using dependent sources, mesh analysis,\nsuper mesh analysis, nodal analysis, super node analysis, source\ntransformation and source shifting, superposition theorem,\nThevenin''s theorems and Norton''s theorem, maximum power\ntransfer theorem. Solution of network with A.C. sources:\nmagnetic coupling, mesh analysis, nodal analysis, superposition\ntheorem, Thevenin''s theorems, Norton''s theorem, maximum\npower transfer theorem, Tellegen''s theorem, Millman''s theorem,\nreciprocity theorem.', 1),
(166, 'Graph theory and network topology ', 63, 'Introduction, graph of network, tree, co-tree, loop incidence\r\nmatrix, cut set matrix, tie set matrix and loop current, number of\r\npossible tree of a graph, analysis of network equilibrium\r\nequation, duality. ', 1),
(167, 'First Order and Second order differential equations ', 63, 'Initial condition of networks, General and partial solutions, time\r\nconstant, integrating factor, more complicated network,\r\ngeometrical interpretation of derivative. ', 1),
(168, 'The Laplace Transform ', 63, 'The Laplace transform and its application to network analysis,\r\ntransient and steady state response to step, ramp, impulse and\r\nsinusoidal input function, transform of other signal waveform,\r\nshifted step, ramp and impulse function, waveform synthesis ', 1),
(169, 'Network Functions; Poles and Zeros & Two port parameters', 63, 'Network functions for one port and two port networks, Driving\r\npoint and transfer functions, ladder network, General network,\r\npoles and zeros of network functions, restrictions on Pole and\r\nzero locations for driving point functions and Transfer functions,\r\ntime domain behavior from pole - zero plot. Open circuit, short circuit, transmission and hybrid Parameters,\r\nrelationships between parameter sets, reciprocity and symmetry\r\nconditions, parallel connection of two port networks ', 1),
(170, 'Network Synthesis ', 63, 'Concept of stability, Hurwitz polynomials, Properties and testing\r\nof positive real functions, Driving point synthesis of LC, RC, RL\r\nnetwork. ', 1),
(171, 'Principles of Analog Instruments ', 64, 'Errors in Measurement, Difference between Indicating and\r\nIntegrating Instruments. Moving coil and Moving iron\r\nAmmeters & Voltmeters. Extension of ranges by using shunt,\r\nMultipliers, Instrument Transformers (only a brief\r\nexplanation), Dynamometer type Wattmeter & Power Factor\r\nmeters. Reed Moving Coil type Frequency Meters. Principle\r\nof double voltmeter. Double frequency meter. Weston type\r\nSynchroscope. DC Permanent magnet moving coil type\r\nGalvanometers. Ballistic Galvanometer. AC Vibration\r\nGalvanometer (only the basic working Principle and\r\nApplication). ', 1),
(172, 'Principles of Digital Instruments ', 64, 'Advantages of digital meters over analogue meters. Resolution &\r\nsensitivity of digital meters. Working principles of digital\r\nVoltmeter, Ammeter, Frequency meter, Phase Meter, Energy\r\nmeter, Tachometer and Multimeter ', 1),
(173, 'Measurement of Resistance ', 64, 'Wheatstone''s Bridge, Kelvin''s Double Bridge and Megger', 1),
(174, 'Measurement of Inductance & Capacitance ', 64, 'Maxwell''s Inductance bridge, Maxwell''s Inductance &\nCapacitance Bridge, Hay''s bridge, Anderson''s Bridge,\nDesaugthy''s Bridge, Schering Bridge, Q meter', 1),
(175, 'Potentiometer', 64, 'Working principle of Crompton''s Type and its applications for\ncalibration of Ammeter, Voltmeter & Wattmeter ', 1),
(176, 'Transducers', 64, 'Electrical Transducers, Active & Passive Transducers, Resistive Transducer-Potentiometer, Resistance Pressure\r\nTransducer, Resistive Position Transducer , Temperature Transducer- Resistance Thermometer, Thermistor,\r\nThermo couple, RTD, Inductive Transducer-Using Self Inductance, Variable Reluctance\r\ntype, Differential Output Transducers, LVDT, RVDT, Capacitive Transducer-Capacitive Pressure Transducer, Piezo Electrical Transducer, Photo Electric Transducer(Photo\r\nemissive, Photo Conductive, Photo Voltaic)', 1),
(177, 'Fundamental concepts of object oriented programming', 21, 'Overview of programming, Introduction to the principles of object-oriented programming: classes,\r\nobjects, messages, abstraction, encapsulation, inheritance, polymorphism,\r\nexception handling, and object-oriented containers, Differences and similarity between C++ and JAVA', 1);
INSERT INTO `chapter` (`Chp_id`, `chapterName`, `Subj_id`, `description`, `common`) VALUES
(178, 'Fundamental of Java programming ', 21, 'Features of Java, JDK Environment & tools , Structure of Java program, Keywords , data types, variables, operators, expressions, Decision making, looping, type casting, Input output using scanner class', 1),
(179, 'Classes and objects ', 21, 'Creating classes and objects, Memory allocation for objects, Passing parameters to Methods, Returning parameters, Method overloading, Constructor and finalize ( ), Arrays: Creating an array, Types of array : One dimensional arrays ,Two Dimensional array, string', 1),
(180, 'Inheritance, interface and package', 21, 'Types of inheritance: Single, multilevel, hierarchical, Method overriding, super keyword, final keyword, abstract class, Interface, Packages', 1),
(181, 'Multithreading', 21, 'Life cycle of thread, Methods, Priority in multithreading', 1),
(182, 'Applet ', 21, 'Applet life cycle, Creating applet, Applet tag ', 1),
(185, 'DC Machines', 9, 'Construction of machine, Armature winding, Principle of operation,\r\nMMF and flux density waveforms, Significance of commutator and\r\nbrushes in DC machine, EMF and Torque equation, Methods of\r\nexcitations, Armature reaction, Methods to minimize the effect of\r\narmature reaction, Process of commutation, Methods to improve\r\ncommutation. ', 1),
(186, 'DC Motors', 9, 'Characteristics of DC Motors, Concept of braking of DC separately\r\nexcited motors (Rheostatic, Regenerative and plugging). Starters for\r\nshunt and series motors, Design of grading of resistance for starter,\r\nSpeed Control, Losses and efficiency, Applications of DC motor.', 1),
(187, 'Testing of DC Motors ', 9, 'Retardation, Brake load, Swinburne, Hopkinson''s, Field test', 1),
(188, 'Transformer - Single Phase ', 9, 'Review of EMF equation, Equivalent Circuit and Phasor diagram of\nTransformer.\nVoltage Regulation of Transformer: - Voltage Regulation, Condition\nfor Zero Voltage Regulation, Condition for Maximum Voltage\nRegulation.\nTransformer Losses and Efficiency - Losses, Efficiency, Condition for\nMaximum Efficiency, Energy Efficiency, All day Efficiency,\nSeparation of Hysteresis and Eddy current losses\nTesting of Transformer: - Polarity Test, Load Test, Review of OC and\nSC test, Sumpner''s Test, Impulse test.\nAutotransformer:- Autotransformer Working, Advantages of\nAutotransformer over Two winding Transformer, Disadvantages\nParallel Operation: No load Operation, On load Operation:- Equal\nVoltage Operation and Unequal Voltage Operation\nIntroduction to High Frequency Transformer, Pulse Transformer,\nIsolation Transformer and its applications. ', 1),
(189, 'Error Analysis', 69, ' Types, estimation, error propagation. ', 1),
(190, 'Roots of equation & Linear Algebraic Equations', 69, 'Bracketing Methods- The bisection method,\r\nthe false-position method, Open methods-The Newton-Raphson\r\nmethod, The secant method, Systems of Nonlinear EquationsNewton\r\nRaphson method. Application for the design of an\r\nelectric circuit. LU Decomposition, Solution of\r\ncurrents and voltages in Resistor circuits. ', 1),
(191, 'Curve Fitting', 69, ' Interpolation with Newton''s divided- difference\ninterpolating polynomials, Lagrange interpolating polynomials,\nCoefficients of interpolating polynomials, Inverse interpolation,\ncurve fitting with sinusoidal functions. ', 1),
(192, 'Solution of ordinary differential equation', 69, 'Predictor -corrector\nmethods, Milne''s method, Adams-Bashforth method, solution of\nsimultaneous first order & second order differential equations by\nPicard''s and Runge-Kutta methods. Simulating transient current\nfor an electric circuit. ', 1),
(193, 'One dimensional unconstrained Optimization', 69, 'Golden-section\nsearch, quadratic interpolation, Newton''s method. ', 1),
(194, 'Constrained Optimization & Non-linear programming', 69, 'Introduction of L.P.P., Formulation\nof the L.P.P., Canonical and Standard forms of L.P.P., solution\nof L.P.P. by Graphical Method, Introduction to Simplex Method,\nGeneral Linear Programming Problem, Procedure of simplex\nmethod. Introduction, Single variable\noptimization, Multivariable optimization with equality\nconstraint-Lagrange''s method, Multivariable optimization with\nnon-equality constraint- Kuhn-Tucker conditions', 1),
(195, 'Operational Amplifiers: Fundamentals ', 68, 'Basics of an Op-amp, Op-amp parameters, Frequency response', 1),
(196, 'Application of Operational Amplifiers, Linear Voltage Regulators, IC - 555', 68, 'Voltage follower, design of inverting and non- inverting amp, adder,\nsubtractor, integrator and differentiator, V to I and I to V converter,\nprecision rectifier, Schmitt trigger, sample and hold circuits, clipping and\nclamping, active filters: LP, HP and BP, Instrumentation amplifier,\nOptical isolation amplfier. IC -78xx, 79xx, LM 317. Design of\nadjustable voltage source using IC- LM317, Low Dropout (LDO) voltage\nregulator, functional block diagram, Application of IC555 - Design of\nMultivibrator (Monostable and Astable), VCO', 1),
(197, 'Analog-to-Digital converter (ADC) ', 68, 'Characteristics and types of ADC\n- i) Successive approximation, ii) Flash ADC, iii) Dual slope, Serial ADC\nBasics of Digital to Analog converter (DAC) ', 1),
(198, 'Logic families', 68, 'Review of Number formats: Binary, hexadecimal, BCD and their basic\r\nmath operations like addition and subtraction\r\nIntroduction to Logic gates and Boolean Algebra\r\nSpecifications of Digital IC, Logic Families: TTL, TTL variant families:\r\nlike standard, LS, HS, Tristate gate, CMOS logic, Comparison of logic\r\nfamilies, Interfacing of TTL and CMOS different families. ', 1),
(199, 'Combinational Logic Circuit', 68, 'K-Maps and their use in specifying Boolean expressions upto 4 variables,\nMinterm, Maxterm, SOP and POS implementation Implementing logic\nfunction using universal gates, Binary Arithmetic circuits: Adders,\nSubtractors (Half and Full), BCD adder - Subtractor, Carry look ahead\nadder, Serial adder, Multiplier Magnitude comparators, Designing code\nconverter circuit e.g binary to gray, BCD to Seven segment parity\ngenerator, Arithmetic Logic units. Multiplexer (ULM), Shannon''s\ntheorem, De- multiplexers, Designing using ULMS. Hazards in\ncombinational circuits.', 1),
(200, 'Sequential Logic Circuits', 68, 'Comparison of combinational & sequential circuit\r\nFlip-flops:SR, T, D, JK, Master Slave JK, Converting one flip-flop to\r\nanother, Use of debounce switch\r\nCounters: Modulus of counter, Design of Synchronous, Asynchronous\r\ncounters, Ripple counters, Up/Down Counter, Ring counter, Johnson\r\ncounter, Sequence generator. Unused states and locked conditions.\r\nShift Registers ', 1),
(201, 'Introduction to Power System', 67, 'Typical AC supply system, comparison between\r\nDC and AC supply system, choice of working voltage for\r\ntransmission and distribution ', 1),
(202, 'Transmission line parameters ', 67, 'Resistance:\r\nResistance, skin effect and proximity effect\r\nInductance\r\nDefinition of inductance, inductance of single phase two wire\r\nline, conductor types, bundled conductors. Inductance of\r\ncomposite conductor, single circuit three phase line, double\r\ncircuit three phase line \r\nCapacitance\r\nPotential difference between two conductors of a group of\r\nparallel conductors, capacitance of a two wire line, three phase\r\nline with equilateral spacing, three phase line with\r\nunsymmetrical spacing earth effect on transmission line\r\ncapacitance, bundled conductors, method of GMD ', 1),
(203, 'Performance of transmission line ', 67, 'Representation of power system components\r\nSingle phase solution of balanced three phase networks. One line\r\ndiagram, impedance and reactance diagram. Per unit (p.u.)\r\nsystem, per unit impedance diagram, representation of loads\r\nTransmission line model\r\nShort, medium, and long line model. Equivalent circuit of a long\r\nline. Ferranti effect. Tuned power lines, surge impedance\r\nloading, power flow through transmission lines (Numerical\r\ncompulsory) ', 1),
(204, 'Overhead Transmission Line ', 67, 'Mechanical design of transmission line\r\nComponents of overhead lines, types of towers- A type, B type,\r\nC type, D type and double circuit tower, cross arms, conductor\r\nconfiguration, spacing and clearance span lengths, sag and\r\ntension (Numerical compulsory)\r\nOverhead line Insulators\r\nTypes of insulators. String efficiency, methods of equalizing\r\npotential (Numerical compulsory) ', 1),
(205, 'Underground Cable', 67, 'General construction, types of cable- PVC insulated, XLPE,\r\nPaper impregnated, mineral insulated, insulation resistance of\r\nsingle core cable, capacitance of single core cable, grading of\r\ncable, selection of cable,\r\nComparison between overhead line transmission with\r\nunderground cabling system ', 1),
(206, 'Grounding and safety techniques ', 67, 'Measurement of earth resistance. Soil resistivity, tolerable limits\r\nof body currents, tolerable step and touch voltage, actual step\r\nand touch voltage, measurement of tower footing resistance,\r\ncounterpoise methods of neutral grounding, grounding practices ', 1),
(208, 'Fourier Series', 10, 'Fourier Series , Power spectrum, Power spectral density, Fourier Transform, Energy spectrum, Energy spectral density, Z-Transform (single & double sided), ROC determination, Properties of Z-Transform, Inverse Z-Transform', 1),
(209, 'Solution of difference equation, LTI System', 10, 'Solution of difference equation, Magnitude and phase response of LTI system, Pole-zero diagram ', 1),
(210, 'Frequency Domain Analysis of DT systems', 10, 'Domain analysis using analytical and graphical technique,  System classification based on pass band, System classification based on phase response and location of\r\n zeros as minimum phase, maximum phase mixed phase ', 1),
(211, 'DTFT, DFT, DFT properties, FFT (redix-2, DIT)', 10, ' ', 1),
(212, 'Z-Transform', 10, 'Z-Transform (single & double sided), ROC determination, Properties of Z-Transform, Inverse Z-Transform ', 1),
(213, 'Introduction to Data Structure', 22, 'Types of Data Structure, Arrays, Strings, Recursion, ADT (Abstract Data\r\ntype),Concept of Files,Operations with files, types of files', 1),
(214, 'Linked List', 22, 'Linked List as an ADT, Linked List Vs. Arrays, Memory Allocation &\r\nDe-allocation for a Linked List, Linked List operations, Types of Linked\r\nList, Implementation of Linked List, Application of Linked Listpolynomial,\r\nsparse matrix.', 1),
(215, 'STACK', 22, 'The Stack as an ADT, Stack operation, Array Representation of Stack,\r\nLink Representation of Stack, Application of stack – Recursion, Polish\r\nNotation', 1),
(216, 'Queues', 22, 'The Queue as an ADT, Queue operation, Array Representation of Queue,\r\nLinked Representation of Queue, Circular Queue, Priority Queue, & Dequeue,\r\nApplication of Queues : Johnsons Algorithm, Simulation', 1),
(217, 'Trees', 22, 'Basic trees concept, Binary tree representation,Binary tree operation,\r\nBinary tree traversal, Binary search tree implementation, Thread Binary\r\ntree, The Huffman Algorithm, Expression tree, Introduction to Multiway\r\nsearch tree and its creation(AVL, B-tree, B+ tree)', 1),
(218, 'Graphs', 22, 'Basic concepts, Graph Representation, Graph traversal (DFS & BFS)', 1),
(219, 'Sorting and Searching', 22, 'Sort Concept, Shell Sort, Radix sort, Insertion Sort, Quick Sort, Merge\r\nSort,Heap Sort,List Search,Linear Index Search, Index Sequential Search\r\nHashed List Search, Hashing Methods , Collision Resolution', 1),
(220, 'Number Systems and Codes', 23, 'Revision of Binary, Octal, Decimal and Hexadecimal number Systems\r\nand their conversion, Binary Addition and Subtraction (1s and 2s\r\ncomplement method),\r\nGray Code,\r\nBCD Code,\r\nExcess-3 code,\r\nASCII Code,\r\nError Detection and Correction Codes.', 1),
(221, 'Boolean Algebra and Logic Gates', 23, 'Theorems and Properties of Boolean Algebra,\r\nStandard SOP and POS form, Reduction of Boolean functions using\r\nAlgebric method, K -map method (2,3,4 Variable), and Quine-\r\nMcClusky Method.\r\nNAND-NOR Realization.\r\nBasic Digital Circuits:\r\nNOT,AND,OR,NAND,NOR,EX-OR,EX-NOR Gates, Logic\r\nFamilies: Terminologies like Propagation Delay, Power Consumption\r\n, Fan in and Fan out etc. with respect to TTL and CMOS Logic and\r\ncomparison.', 1),
(222, 'Combinational Logic Design', 23, 'Introduction, Half and Full Adder, Half\r\nand Full Subtractor, Four Bit Binary Adder, one digit BCD Adder,\r\nFour Bit Binary Subtractor ( 1s and 2s compliment method), code\r\nconversion, Multiplexers and Demultiplexers, Decoders, One bit,\r\nTwo bit ,4-bit Magnitude Comparator', 1),
(223, 'Sequential Logic Design,Counters and Shift Registers', 23, 'Concept of Multivibrators: Astable,\r\nMonostable and Bistable multivibrators, Flip Flops:SR, D, JK, JK Master Slave and T Flip Flop, Truth Tables and Excitation Tables,\r\nFlip-flop conversion.\r\nsequential circuit analysis , construction of state diagrams.Design of Asynchronous and Synchronous Counters,\r\nModulo Counters, UP- DOWN counter.SISO, SIPO,PIPO,PISO, Bidirectional Shift Register\r\n, Universal Shift Register, Ring and Johnson Counter. Pseudorandom\r\nsequence generator', 1),
(224, 'Functional Simulation', 23, 'Functional Simulation , Timing Simulation, Logic synthesis,\r\nIntroduction to VHDL, Framework of VHDL programPracticals), Introduction to\r\nCPLD and FPGA', 1),
(225, 'Set Theory', 24, 'Sets, Venn diagrams, Operations on Sets\r\nLaws of set theory, Power set and Products\r\nPartitions of sets, The Principle of Inclusion and Exclusion', 1),
(226, 'Logic', 24, 'Propositions and logical operations, Truth tables\r\nEquivalence, Implications\r\nLaws of logic, Normal Forms\r\nPredicates and Quantifiers\r\nMathematical Induction', 1),
(227, 'Relations, Digraphs and Lattices', 24, 'Relations, Paths and Digraphs\r\nProperties and types of binary relations\r\nManipulation of relations, Closures, Warshall’s algorithm\r\nEquivalence and partial ordered relations\r\nPosets and Hasse diagram\r\nLattice', 1),
(228, 'Functions and Pigeon Hole Principle', 24, 'Definition and types of functions: Injective, Surjective and Bijective\r\nComposition, Identity and Inverse\r\nPigeon-hole principle', 1),
(229, 'Generating Functions and Recurrence Relations', 24, 'Series and Sequences\r\nGenerating functions\r\nRecurrence relations\r\nRecursive Functions: Applications of recurrence relations e,g, Factorial,\r\nFibonacci, Binary search, Quick Sort etc.', 1),
(230, 'Graphs and Subgraphs', 24, 'Definitions, Paths and circuits: Eulerian and Hamiltonian\r\nPlaner graphs, Graph coloring\r\nIsomorphism of graphs\r\nSubgraphs and Subgraph isomorphism', 1),
(231, 'Trees\r\n', 24, 'Trees and weighted trees\r\nSpanning trees and minimum spanning tree\r\nIsomorphism of trees and sub trees\r\nPrefix codes', 1),
(232, 'Algebraic Structures', 24, 'Algebraic structures with one binary operation: semigroup, monoids and\r\ngroups\r\nProduct and quotient of algebraic structures\r\nIsomorphism, Homomorphism and Automorphism\r\nCyclic groups, Normal subgroups\r\nCodes and group codes', 1),
(233, 'Electronic Circuits', 25, 'Field effect based devices and circuits:\r\nJunction Field Effect Transistors, JFET Characteristics,\r\nFET amplification and switching,\r\nDC load line and bias point, ate bias, self bias, voltage divider\r\nbias, coupling, bypassing and AC load lines,\r\nFET models and parameters,\r\nCommon source circuit analysis principle of oscillation,\r\nFET based Hartley and Colpitts Oscillator.\r\nCrystal oscillator\r\nBJT as power amplifier ( only class A and C)\r\nOperational Amplifier and its applications:\r\nOp-amp parameters and characteristics,\r\nInverting and Non-inverting amplifier,\r\nComparator,\r\nSumming Amplifier,\r\nIntegrator,\r\nDifferentiator,\r\nZero Crossing Detector.\r\nPhase Lock Loop:\r\nOperating principle of PLL,\r\nLock range and capture range.', 1),
(234, 'Modulation', 25, 'Principles of Analog Communication:\r\nElements of analog communication systems,\r\nTheory of amplitude modulation and types of AM,\r\nGeneration of DSB SC using balanced modulator,\r\nGeneration of SSB using phase shift method\r\nTheory of FM and PM,\r\nGeneration of FM by Armstrong method', 1),
(235, 'Demodulation', 25, 'Principle of super heterodyne receiver.\r\nFoster seely detector for FM detection\r\nApplication of PLL (IC 565) as FM detector , Frequency\r\ntranslator, Phase shifter, and freq synthesizer\r\nConcept of sampling :Sampling Theorem, Types of sampling\r\nQuantization , A/D and D/A conversion concept\r\nPulse Modulation: generation and detection of PAM, PPM,\r\nPWM, PCM, DM and ADM.Principle of TDM and FDM.', 1),
(236, 'Introduction to analysis of algorithm', 3, 'Decision and analysis fundamentals\r\nPerformance analysis , space and time complexity\r\nGrowth of function  Big Oh ,Omega , Theta notation\r\nMathematical background for algorithm analysis\r\nAnalysis of selection sort , insertion sort\r\nRandomized algorithms\r\nRecursive algorithms\r\nThe substitution method\r\nRecursion tree method\r\nMaster method', 1),
(237, 'Dynamic Programming', 3, 'General Method\r\nMultistage graphs\r\nall pair shortest path\r\nsingle source shortest path\r\nOptimal binary search tree\r\n0/1 knapsack\r\nTravelling salesman problem\r\nFlow shop scheduling', 1),
(238, 'Backtracking', 3, 'General Method\r\n8 queen problem( N-queen problem)\r\nSum of subsets\r\nGraph coloring', 1),
(239, 'String Matching Algorithms', 3, 'The naive string matching Algorithms\r\nThe Rabin Karp algorithm\r\nString matching with finite automata\r\nThe knuth-Morris-Pratt algorithm\r\nLongest common subsequence algorithm', 1),
(240, 'Branch and bound', 3, 'General method\r\n15 puzzle problem\r\nTravelling salesman problem', 1),
(241, 'Introduction Database Concepts', 4, 'Introduction, Characteristics of\r\ndatabases, File system V/s Database system, Users of Database system,\r\nConcerns when using an enterprise database, Data Independence, DBMS\r\nsystem architecture, Database Administrator,', 1),
(242, 'Structured Query Language (SQL)', 4, 'Overview of SQL , Data Definition\r\nCommands, Set operations , aggregate function , null values, , Data\r\nManipulation commands, Data Control commands , Views in SQL', 1),
(243, 'Integrity and Security in Database', 4, 'Domain Constraints, Referential\r\nintegrity, Assertions, Trigger, Security, and authorization in SQL', 1),
(244, 'Relational Database Design', 4, 'Design guidelines for relational schema,\r\nFunction dependencies, Normal Forms- 1NF, 2 NF, 3NF, BCNF and 4NF', 1),
(245, 'Transactions Management and Concurrency', 4, 'Transaction concept,\r\nTransaction states, ACID properties, Implementation of atomicity and\r\ndurability, Concurrent Executions, Serializability, Recoverability,\r\nImplementation of isolation, Concurrency Control: Lock-based ,\r\nTimestamp-based , Validation-based protocols, Deadlock handling,\r\nRecovery System: Failure Classification, Storage structure, Recovery &\r\natomicity, Log based recovery, Shadow paging.', 1),
(246, 'Query Processing and Optimization', 4, 'Issues in Query\r\nOptimization ,Steps in Query Processing , System Catalog or Metadata,\r\nQuery Parsing , Query Optimization, Access Paths , Query Code\r\nGeneration , Query Execution , Algorithms for Computing Selection and\r\nProjection , Algorithms for Computing a Join , Computing Aggregation\r\nFunctions , Cost Based Query Optimization .', 1),
(247, 'Overview of Computer Architecture & Organization', 28, 'Introduction of Computer Organization and Architecture.\r\nBasic organization of computer and block level description of\r\nthe functional units.\r\nEvolution of Computers, Von Neumann model.\r\nPerformance measure of Computer Architecture.\r\nIntroduction to buses and connecting I/O devices to CPU and\r\nMemory, bus structure.', 1),
(248, 'Data Representation and Arithmetic Algorithms', 28, 'Number representation: Binary Data representation, 2s complement representation and Floating-point representation. IEEE 754 floating point number\r\nrepresentation.\r\nInteger Data computation: Addition, Subtraction.\r\nMultiplication: Signed multiplication, Booths algorithm.\r\nDivision of integers: Restoring and non-restoring division\r\nFloating point arithmetic: Addition, subtraction', 1),
(249, 'Processor Organization and Architecture', 28, 'CPU Architecture, Register Organization , Instruction\r\nformats, basic instruction cycle. Instruction interpretation and\r\nsequencing.\r\nControl Unit: Soft wired (Micro-programmed) and\r\nhardwired control unit design methods. Microinstruction\r\nsequencing and execution. Micro operations, concepts of\r\nnano programming.\r\nIntroduction to RISC and CISC architectures and design\r\nissues.\r\nCase study on 8085 microprocessor: Features, architecture,\r\npin configuration and addressing modes.', 1),
(250, 'Memory Organization', 28, 'Introduction to Memory and Memory parameters.\r\nClassifications of primary and secondary memories. Types of\r\nRAM and ROM, Allocation policies, Memory hierarchy and\r\ncharacteristics.\r\nCache memory: Concept, architecture (L1, L2, L3), mapping\r\ntechniques. Cache Coherency, Interleaved and Associative\r\nmemory.\r\nVirtual Memory: Concept, Segmentation and Paging , Page\r\nreplacement policies.', 1),
(251, 'I/O Organization and Peripherals', 28, 'Input/output systems, I/O modules and 8089 IO processor.\r\nTypes of data transfer techniques: Programmed I/O,\r\nInterrupt driven I/O and DMA.\r\nPeripheral Devices: Introduction to peripheral devices,\r\nscanner, plotter, joysticks, touch pad.', 1),
(252, 'Introduction to parallel processing systems', 28, 'Introduction to parallel processing concepts ,Flynns classifications\r\n,pipeline processing,instruction pipelining,pipeline stages and pipeline hazards.', 1),
(253, 'Introduction', 30, 'Alphabets, Strings and Languages\r\nChomskey hierarchy and Grammars.\r\nFinite Automata (FA) and Finite State machine (FSM).', 1),
(254, 'Regular Grammar (RG)', 30, 'Regular Grammar and Regular Expression (RE): Definition,\r\nEquivalence and Conversion from RE to RG and RG to RE.\r\nEquivalence of RG and FA, Converting RG to FA and FA to RG.\r\nEquivalence of RE and FA, Converting RE to FA and FA to RE.', 1),
(255, 'Finite Automata', 30, 'Deterministic and Nondeterministic Finite Automata ( DFA and NFA ):\r\nDefinitions, Languages, Transitions ( Diagrams, Functions and Tables).\r\nEliminating epsilon-transitions from NFA.\r\nDFA, NFA: Reductions and Equivalence.\r\nFSM with output: Moore and Mealy machines.', 1),
(256, 'Regular Language (RL)', 30, 'Decision properties: Emptiness, Finiteness and Membership.\r\nPumping lemma for regular languages and its applications.\r\nClosure properties.\r\nMyhill-Nerode Theorem and An application: Text Search.', 1),
(257, 'Context Free Grammars (CFG)', 30, 'Definition, Sentential forms, Leftmost and Rightmost derivations.\r\nContext Free languages (CFL): Parsing and Ambiguity.\r\nCFLs: Simplification and Applications.\r\nNormal Forms: CNF and GNF.\r\nPumping lemma for CFLs and its applications.\r\nClosure properties and Kleenes closure.', 1),
(258, 'Pushdown Automata(PDA)', 30, 'Definition, Transitions ( Diagrams, Functions and Tables), Graphical\r\nNotation and Instantaneous Descriptions.\r\nLanguage of PDA, Pushdown Stack Machine ( PSM ) as a machine with\r\nstack, Start and Final state of PSM.\r\nPDA/PSM as generator, decider and acceptor of CFG\r\nDeterministic PDA (DPDA) and Multi-stack DPDA.', 1),
(259, 'Turing Machine (TM)', 30, 'Definition, Transitions ( Diagrams, Functions and Tables).\r\nDesign of TM as generator, decider and acceptor.\r\nVariants of TM: Multitrack, Multitape and Universal TM.\r\nEquivalence of Single and Multi Tape TMs.\r\nPower and Limitations of TMs.\r\nDesign of Single and Multi Tape TMs as a computer of simple\r\nfunctions: Unary, Binary ( Logical and Arithmetic ), String operations (\r\nLength, Concat, Match, Substring Check, etc )', 1),
(260, 'Undecidability and Recursively Enumerable Languages', 30, 'Recursive and Recursively Enumerable Languages.\r\nProperties of Recursive and Recursively Enumerable Languages.\r\nDecidability and Undecidability, Halting Problem, Rices Theorem,\r\nGrebachs Theorem, Post Correspondence Problem,\r\nContext Sensitivity and Linear Bound Automata.', 1),
(261, 'Comparison of scope of languages and machines', 30, 'Subset and Superset relation between FSM, PSM and TM.\r\nSubset and Superset relation between RL, CFL and Context Sensitive\r\nLanguage.', 1),
(262, 'Introduction to Computer Graphics', 31, '(a) What is Computer Graphics?\r\n(b) Where Computer Generated pictures are used\r\n(c) Elements of Pictures created in Computer Graphics\r\n(d) Graphics display devices\r\n(e) Graphics input primitives and Devices', 1),
(263, 'Introduction to openGL', 31, '(a) Getting started Making pictures\r\n(b) Drawing basic primitives\r\n(c) Simple interaction with mouse and keyboard', 1),
(264, 'Output Primitives', 31, '(a) Points and Lines, Antialiasing\r\n(b) Line Drawing algorithms\r\nDDA line drawing algorithm\r\nBresenhams drawing algorithm\r\nParallel drawing algorithm\r\n(c) Circle and Ellipse generating algorithms\r\nMid-point Circle algorithm\r\nMid-point Ellipse algorithm\r\n(d) Parametric Cubic Curves\r\nBezier curves\r\nB-Spline curves', 1),
(265, 'Filled Area Primitives', 31, '(a) Scan line polygon fill algorithm\r\n(b) Pattern fill algorithm\r\n(c) Inside-Outside Tests\r\n(d) Boundary fill algorithms\r\n(e) Flood fill algorithms', 1),
(266, '2D Geometric Transformations', 31, '(a) Basic transformations\r\n(b) Matrix representation and Homogeneous Coordinates\r\n(c) Composite transformation\r\n(d) Other transformations\r\n(e) Transformation between coordinated systems', 1),
(267, '2D Viewing', 31, '(a) Window to Viewport coordinate transformation\r\n(b) Clipping operations : Point clipping\r\n(c) Line clipping\r\nCohen  Sutherland line clipping\r\nLiang  Barsky line clipping\r\nMidpoint subdivision\r\n(d) Polygon Clipping\r\nSutherland –Hodgeman polygon clipping\r\nWeiler  Atherton polygon clipping', 1),
(268, '3D Geometric Transformations and 3D Viewing', 31, '(a) 3D object representation methods\r\nB-REP , sweep representations , CSG\r\n(b) Basic transformations\r\nTranslation\r\nRotation\r\nScaling\r\n(c) Other transformations\r\n1. Reflection\r\n2. Rotation about an arbitrary axis\r\n(d) Composite transformations\r\n(e) Projections : Parallel and Perspective\r\n(f) 3D clipping', 1),
(269, '3D Geometric Transformations and 3D Viewing', 31, '(a) Classification of Visible Surface Detection algorithm\r\n(b) Back Surface detection method\r\n(c) Depth Buffer method\r\n(d) Scan line method\r\n(e) BSP tree method\r\n(f) Area Subdivision method', 1),
(270, 'Illumination Models and Surface Rendering', 31, '(a) Basic Illumination Models\r\n(b) Halftone and Dithering techniques\r\n(c) Polygon Rendering\r\nConstant shading , Goraud Shading , Phong Shading', 1),
(271, 'Fractals', 31, '(a) Introduction\r\n(b) Fractals and self similarity\r\nSuccessive refinement of curves, Koch curve,\r\nFractional Dimension,\r\n(c) String production and peano curves', 1),
(272, 'Introduction', 1, 'History and development of computer network, network\r\napplication, network software and hardware components, topology,\r\nprotocol hierarchies, design issues for the layers, connection oriented\r\nand connectionless services, reference models: layer details of OSI,\r\nTCP/IP models. Communication between layers.', 1),
(273, 'Physical Layer', 1, 'Guided Transmission Media: Twisted pair, Coaxial, Fiber optics.\r\nUnguided media (Wireless Transmission): Radio Waves,Bluetooth, Infrared, Virtual LAN.', 1),
(274, 'Network Management', 1, 'SNMP Concept, Management Components, SMI, MIB,\r\nSNMP Format, Messages.', 1),
(275, 'Intel 8086/8088 Architecture', 32, '8086/8088 Microprocessor Architecture, Pin Configuration,\r\nProgramming Model, Memory Segmentation, Study of 8284\r\nClock Generator, Operating Modes, Study of 8288 Bus\r\nController, Timing diagrams for Read and Write operations,\r\nInterrupts.', 1),
(276, 'Instruction Set and Programming', 32, 'Instruction Set of 8086, Addressing Modes, Assembly\r\nLanguage Programming, Mixed Language Programming\r\nwith C Language and Assembly Language.', 1),
(277, 'System designing with 8086', 32, 'Memory Interfacing: SRAM, ROM and DRAM (using\r\nDRAM ControllerIntel\r\n8203).\r\nApplications of the Peripheral Controllers namely 8255PPI,\r\n8253PIT,\r\n8259PIC\r\nand 8237DMAC.\r\nInterfacing of the\r\nabove Peripheral Controllers with 8086 microprocessor.\r\nIntroduction to 8087 Math Coprocessor and 8089 I/O\r\nProcessor.', 1),
(278, 'Intel 80386DX Processor', 32, 'Study of Block Diagram, Signal Interfaces, Bus Cycles,\r\nProgramming Model, Operating Modes, Address Translation\r\nMechanism in Protected Mode, Memory Management,\r\nProtection Mechanism.', 1),
(279, 'Pentium Processor', 32, 'Block Diagram, Superscalar Operation, Integer & Floating\r\nPoint Pipeline Stages, Branch Prediction, Cache\r\nOrganization.\r\nComparison of Pentium 2, Pentium 3 and Pentium 4\r\nProcessors. Comparative study of Multi core Processors i3,\r\ni5 and i7.', 1),
(280, 'SuperSPARC Architecture', 32, 'SuperSPARC Processor, Data Formats, Registers, Memory\r\nmodel. Study of SuperSPARC Architecture', 1),
(281, 'Introduction', 33, 'Introduction to Operating System, Objectives and Functions of\r\nO.S., OS Services, Special purpose systems, Types Of OS, System\r\nCalls, types of system calls, Operating system structure ,System\r\nBoot.', 1),
(282, 'Process Management', 33, 'Process concept, operations on process\r\nProcess scheduling: basic concepts , scheduling criteria , scheduling\r\nalgorithms, Preemptive, Nonpreemptive,\r\nFCFS ,SJF ,SRTN\r\n,Priority based, Round Robin ,Multilevel Queue\r\nscheduling,Operating System Examples.\r\nSynchronization: Background , the critical section problem ,\r\nPetersons Solution, Synchronization Hardware Semaphores, classic\r\nproblems of Synchronization: The Producer Consumer\r\nProblem:Readers writers problem, Semaphores, Dinning\r\nPhilosopher Problem\r\n', 1),
(283, 'Deadlock', 33, 'Deadlock Problem, Deadlock Characterization, Deadlock\r\nPrevention. Deadlock avoidance Bankers algorithm for single &\r\nmultiple resources , Deadlock recovery , Deadlock Detection,', 1),
(284, 'Memory Management', 33, 'Memory management strategies: background , swapping\r\n,contiguous memory allocation, paging , structure of page tables ,\r\nsegmentation\r\n\r\nVirtual memory management: Demand paging , copyon\r\nwrite,Page replacement, FIFO, Optimal, LRU, LRU\r\nApproximation,Counting Based, , Allocation of frames , Thrashing', 1),
(285, 'File Management', 33, 'FilesSystem Structure, File System implementation, Directory\r\nimplementation , Allocation Methods contiguous allocation, linked\r\nlist allocation, indexed allocations, Free space management.\r\n\r\nSecondary storage : structures: Disks Scheduling Algorithm:\r\nFCFS, SSTF, SCAN, CSCAN, LOOK, Disk Management', 1),
(286, 'Input Output Management', 33, 'Overview , I/O Hardware , Application I/O Interface', 1),
(287, 'Case Study of UNIX', 33, 'History of UNIX, Overview of UNIX ,UNIX File System, Data\r\nstructures for process/memory management ,Process states and\r\nState Transitions, Using the System(Booting and login ),Process\r\nscheduling , Memory management , Shell programming', 1),
(288, 'Case Study of Linux', 33, 'History , Design Principles , Kernel Modules , Process\r\nmanagement , Scheduling , Memory management , File Systems ,\r\nInput and Output , Inter process communication , Network\r\nstructure , Security', 1),
(289, 'Case study: Windows 7', 33, 'History, Design Principles , System components ,\r\nenvironmental subsystems , File System, Networking, Programmer\r\nInterface', 1),
(290, 'Introduction', 2, 'System overview, Types of Systems ,\r\nKey Differences Between Structured and ObjectOriented\r\nAnalysis and Design\r\nRole of the System Analyst\r\nSystems Development Life Cycle', 1),
(291, 'Feasibility Analysis', 2, 'Feasibility Analysis, Tests for feasibility, CostBenefit\r\nAnalysis,\r\nFeasibility analysis of candidate system.\r\nThe system Proposal.', 1),
(292, 'System Design', 2, 'Moving To Design\r\nThe traditional Approach to design\r\nThe ObjectOriented\r\nApproach to design: Use Case REaliztion\r\nDesigning Database, Designing the User Interface, Designing System\r\nInterfaces, Controls and security', 1),
(293, 'Application Architecture', 2, 'IT Architecture, Application Architecture Strategies, Modeling\r\nApplication Architecture for Information System.\r\nDeployment using UML diagrams, Component and deployment\r\ndiagram for various architectures.', 1),
(294, 'System Software', 18, 'Concept, introduction to various system programs such as assemblers,\r\nloaders , linkers ,macro processors, compilers, interpreters, operating\r\nsystems, device drivers', 1),
(295, 'Assemblers', 18, 'General Design Procedure , Design of Assembler (Single Pass \r\nAssembler IBM PC , multi pass Assembler IBM\r\n360/370 Processor),\r\nStatement of Problem , Data Structure , format of Databases , Algorithm\r\n, Look for modularity', 1),
(296, 'Macros & Macro processors', 18, 'Macro instructions, Features of Macro facility, Design of 2 pass\r\nmacroprocessor', 1),
(297, 'Loaders and Linkers', 18, 'loader schemes, Design of Absolute loader , Design of Direct linking\r\nloader', 1),
(298, 'Software Tools', 18, 'Software Tools for Program development, Editors: Types of Editors ,\r\nDesign of Editor ,Debug Monitors', 1),
(299, 'Compilers', 18, 'Introduction to Compilers, Phases of a compiler, comparison of\r\ncompilers and interpreters.', 1),
(300, 'Lexical Analysis', 18, 'Role of a Lexical analyzer, input buffering, specification and\r\nrecognition of tokens, Designing a lexical analyzer generator, Pattern\r\nmatching based on NFAs.', 1),
(301, 'Syntax Analysis', 18, 'Role of Parser, Topdown\r\nparsing, Recursive descent and predictive\r\nparsers (LL), BottomUp\r\nparsing, Operator precedence parsing, LR,\r\nSLR and LALR parsers.', 1),
(302, 'Syntax Directed Translation', 18, 'Syntax directed definitions, Inherited and Synthesized attributes,\r\nEvaluation order for SDDs , S attributed Definitions , L attributed\r\nDefinitions', 1),
(303, 'Intermediate Code Generation', 18, 'Intermediate languages: declarations, Assignment statements,\r\nBoolean expression, case statements, back patching , procedure calls', 1),
(304, 'Code Generation', 18, 'Issues in the design of Code Generator , Basic Blocks and Flow\r\ngraphs, code generation algorithm , DAG representation of Basic Block', 1),
(305, 'Code Optimization', 18, 'Principal sources of Optimization, Optimization of Basic Blocks\r\n, Loops in Flow graph ,Peephole Optimization', 1),
(306, 'Run Time storage', 18, 'Storage Organization , storage allocation strategies, parameter\r\npassing , Symbol table , introduction to garbage collection and\r\ncompaction', 1),
(307, 'Compilercompilers', 18, 'JAVA compiler environment, YACC compilercompiler', 1),
(308, 'Introduction', 35, 'Software Engineering Process Paradigms\r\nProcess Models : Incremental and Evolutionary models,\r\nTypical Application for each model,\r\nAgile methodology\r\nProcess and Project Metrics.', 1),
(309, 'Software project scheduling, Control & Monitoring', 35, 'Software estimation : Empirical estimation models : Cost/Effort\r\nestimation\r\nPlanning : Work breakdown Structure, Gantt Chart. Discuss schedule\r\nand cost slippage.', 1),
(310, 'Risk Management', 35, 'Risk Identification, Risk Assessment, Risk Projection, RMMM', 1),
(311, 'Software Configuration Management', 35, 'Software Configuration items, SCM process, Identification of objects\r\nin software configuration, version and change control, configuration\r\naudit , status reporting, SCM standards and SCM issues.', 1),
(312, 'Software Design Specification', 35, 'Software Design : Abstraction , Modularity\r\nSoftware Architecture : Effective modular design, Cohesion and\r\nCoupling, Example of code for cohesion and coupling.\r\nUser Interface Design : Human Factors, Interface standards, Design\r\nIssues : User Interface Design Process.', 1),
(313, 'Software Quality', 35, 'Software Quality Assurance : Software standards , Quality metrics\r\nSoftware Reliability ,Quality Measurement and Metrics', 1),
(314, 'Software Testing', 35, 'Basic concept and terminology, Verification & validation, White Box\r\nTestingPath\r\nTesting, Control Structures Testing , DEFUSE\r\ntesting,\r\nBlack Box Testing :BVA Integration, Validation and system testing.\r\nOO testing methodsClass\r\nTesting, Interclass testing, testing architecture,\r\nBehavioral testing.\r\nSoftware Maintenance : Reverse Engineering.', 1),
(315, 'Web Engineering', 35, 'For web based applications : attributes, analysis and design, testing.\r\nSecurity Engineering,\r\nServiceOriented\r\nSoftware Engineering.\r\nTest Driven Development\r\nSoftware engineering with aspects', 1),
(316, 'Concept and Overview Distributed Database system', 36, 'What is Distributed Database System (DDBS), Features of DDBS,\r\npromises of DDBS, Design issue in DDBS, Distributed DBMS\r\narchitecture: Client/server System, PeertoPeer,\r\nMutliDatabase\r\nsystem.', 1),
(317, 'Distributed Database Design', 36, 'Distributed database design concept, objective of Data Distribution, Data\r\nFragmentation, The allocation of fragment , Transparencies in Distributed\r\nDatabase Design', 1),
(318, 'Distributed Transaction and concurrency control', 36, 'Basic concept of Transaction management, objective Distributed\r\ntransaction management, Model for Transaction management\r\nDistributed Concurrency control: Objective, concurrency control\r\nanomalies, Distributed Serializability, Locking based algorithm,\r\nTimestamp based algorithm.', 1),
(319, 'Distributed Deadlock and Recovery', 36, 'Introduction to Deadlock, Distributed Deadlock prevention, avoidance,\r\ndetection and recovery, TwoPhase\r\nand ThreePhase\r\nCommit Protocol.', 1),
(320, 'Distributed query processing and optimization', 36, 'Concept, objective, and phases of distributed query processing; join\r\nstrategies in fragment relation , Global query optimization', 1),
(321, 'Heterogeneous Database', 36, 'Architecture of Heterogeneous Database, Database Integration: Schema\r\nTranslation and schema Integration, Query processing issues in\r\nHeterogeneous database.', 1),
(322, 'XML', 36, 'XML for data integration, structure of XML, XML document schema,\r\nQuerying and Transformation, storage of XML data, XML application', 1),
(323, 'Introduction to Mobile Computing', 37, 'Wireless Communication, Applications, Cellular Systems, Antennas,\r\nsatellite system, GEO, LEO, MEO, GPRS:Architecture,\r\nNetwork nodes,\r\nGPRS support nodes.', 1),
(324, 'GSM cellular telephonyarchitecture\r\nand system aspects', 37, 'Introduction, Basic GSM architecture, Basic radio transmission\r\nparameters of the GSM system, Logical channel description, GSM time\r\nhierarchy, GSM burst structures, Description of the call setup\r\nprocedure,\r\nHandover, Ensuring privacy and authentication of a user, Modifications\r\nand derivatives of GSM', 1),
(325, 'Mobile Network', 37, 'Mobile IP, IP Packet Delivery, Agent Advertisement and Discovery,\r\nRegistration, Tunneling and Encapsulation, Optimization, Reverse\r\nTunneling, Mobile TCP, Fast Retransmit/ Fast Recovery,\r\nTransmission/Timeout Freezing, Selective Retransmission.', 1),
(326, 'Third and Fourth Generation Systems', 37, 'WCDMA,\r\nCDMA 2000; Improvements on Core Networks; Quality of\r\nServices in 3G ; Wireless Local Loop; Wireless Local Loop Architecture;\r\nDeployment Issues; TR45\r\nService Description; Wireless Local Loop\r\ntechnologies. TETRA, UMTS and IMT2000;\r\nUMTS Basic Architecture,\r\nUTRA FDD mode, UTRA TDD mode, 4G Architecture, Comparison\r\nbetween 3G and 4G.', 1),
(327, 'Mobility Management', 37, 'Cochannel\r\nInterference, Mobility: Types of Handoffs; Location\r\nManagement, HLRVLR\r\nscheme, Hierarchical scheme, Predictive\r\nLocation management schemes, cellular IP, PSTN.', 1),
(328, 'Wireless Local Area Networks', 37, 'Introduction, Types of WLANs, Hidden station problem, HIPERLAN\r\nType 1: HIPERLAN/1 MAC sublayer, HIPERLAN/1 CAC layer,\r\nHIPERLAN/1 physical layer. IEEE 802.11 WLAN standards: IEEE\r\n802.11 physical layer, IEEE 802.11 MAC sublayer. IEEE 802.11 and\r\nHIPERLAN standards for 5 GHz band: HIPERLAN/2 physical layer,\r\nHIPERLAN /2 data link control layer. Bluetooth: Introduction, User\r\nScenario, Architecture, protocol.', 1),
(329, 'Introduction to Android', 37, 'Layers, android components, mapping application to process. Android\r\ndevelopment basics. Hardware tools, Software tools, Android SDK\r\nfeatures', 1),
(330, 'Security Issues In Mobile Computing', 37, 'Security Issues, Authentication, Encryption, Cryptographic Tools: Hash,\r\nMessage Authentication Code (MAC), Digital Signature, Certificate.\r\nSecure Socket Layer (SSL). Characteristics of SIM, Equipment\r\nIdentification', 1),
(331, 'What is Operations Research', 39, 'Introduction.', 1),
(332, 'Modeling with Linear Programming', 39, '1 TwoVariable\r\nLP Model\r\n2 Graphical LP Solution\r\n2.1 Solution of a Maximization Model\r\n2.2 Solution of a Minimization Model\r\n3 Computer Solution with Solver and AMPL\r\n3.1 LP solution with Excel Solver\r\n3.2 LP Solution with AMPL\r\n4 Linear Programming Applications\r\n4.1 Investment\r\n4.2 Product Planning and Inventory Control\r\n4.3 Manpower Planning\r\n4.4 Urban Development Planning\r\n4.5 Blending and Refining\r\n4.6 Additional LP Applications', 1),
(333, 'The Simplex Method and Sensitivity Analysis', 39, '1 LP Model in Equation Form\r\n2 Transition from Graphical to Algebraic Solution\r\n3 The Simplex Method\r\n3.1 Iterative Nature of the Simplex Method\r\n3.2 Computational details of the Simplex algorithm\r\n3.3Summary of the Simplex Method\r\n4Artificial Starting Solution\r\n4.1 MMethod\r\n4.2 TwoPhase\r\nMethod\r\n5 Special Cases in the Simplex Method\r\n5.1 Degeneracy\r\n5.2 Alternative Optima\r\n5.3 Unbounded Solution\r\n5.4 Infeasible Solution\r\n6 Sensitivity Analysis\r\n6.1 Graphical Sensitivity Analysis\r\n6.2 Algebraic Sensitivity Analysis – Changes in the Righthand\r\nside\r\n6.3 Algebraic Sensitivity Analysis – Objective function\r\n6.4 Sensitivity Analysis with Tora, Solver, and Ampl\r\n7 Computational issues in Linear Programming', 1),
(334, 'Duality and PostOptimal\r\nAnalysis', 39, '1 Definition of the Dual Problem\r\n2 PrimalDual\r\nRelationships\r\n2.1 Review of Simplex Matrix Operations\r\n2.2 Simplex Tableau Layout\r\n2.3 Optimal Dual Solution\r\n2.4 Simplex Tableau Computations\r\n3 Economic Interpretation of Duality\r\n3.1 Economic Interpretation of Dual Variables\r\n3.2 Economic Interpretation of Dual Constraints\r\n4 Additional Simplex Algorithms\r\n4.1 Dual Simplex Algorithm\r\n4.2 Generalized Simplex Algorithm', 1),
(335, 'Transportation Model and Its Variants', 39, '1 Definition of the Transportation Model\r\n2 Nontraditional Transportation Models\r\n3 The Transportation Algorithm\r\n3.1 Determination of the Starting Solution\r\n3.2 Iterative Computations of the Transportation Algorithm\r\n3.3 Simplex Method Explanation of the Method of Multipliers\r\n4 The Assignment Model\r\n4.1 The Hungarian Method\r\n4.2 Simplex Explanation of the Hungarian Method\r\n', 1),
(336, 'Decision Analysis', 39, '1 Decision Making under Certainty – Analytic Hierarchy Process (AHP)\r\n2 Decision Making under Risk\r\n2.1 Decision TreeBased\r\nExpected Value Criterion\r\n2.2 Variants of the Expected Value \r\nCiterion\r\n3 Decision under Uncertainty', 1),
(337, 'Stimulation Modeling', 39, '1 Monte Carlo Simulation\r\n2 Types of Simulation\r\n3 Elements of Discrete Event Simulation\r\n3.1 Generic Definition of Events\r\n3.2 Sampling from Probability Distributions', 1),
(338, 'Nonlinear Programming Algorithms', 39, '1 Unconstrained Algorithms\r\n1.1 Direct Search Method\r\n1.2 Gradient Method\r\n2 Constrained Algorithms\r\n2.1 Separable Programming\r\n2.2 Quadratic Programming', 1),
(339, 'Discrete Time Signal', 41, 'Introduction to Digital Signal Processing, Discrete Time Signals,\r\nSampling and Reconstruction, Standard DT Signals, Concept of Digital\r\nFrequency, Representation of DT signal using Standard DT Signals,\r\nSignal Manipulations(shifting, addition, subtraction, multiplication),\r\nClassification of Signals, Linear Convolution formulation(without\r\nmathematical proof), Circular Convolution formulation(without\r\nmathematical proof), Matrix Representation of Circular Convolution,\r\nLinear by Circular Convolution. Auto and Cross Correlation formula\r\nevaluation', 1),
(340, 'Discrete Time System', 41, '1 Introduction to Discrete Time System, Classification of DT Systems\r\n(Linear/Non Linear, Causal/Non Causal, Time Invariant/Time Variant\r\nSystems, Stable/ Unstable), BIBO Time Domain Stability Criteria. LTI\r\nsystem, Concept of Impulse Response and Step Response.\r\n2 Concept of IIR System and FIR System, Output of IIR and FIR DT\r\nsystem using Time Domain Linear Convolution formula Method.', 1),
(341, 'Discrete Fourier Transform', 41, '1 Introduction to DTFT, DFT, Relation between DFT and DTFT, Properties\r\nof DFT without mathematical proof (Scaling and Linearity, Periodicity,\r\nTime Shift and Frequency Shift, Time Reversal, Convolution Property\r\nand Parsevals Energy Theorem). DFT computation using DFT properties.\r\n2 Transfer function of DT System in frequency domain using DFT. Linear\r\nand Circular Convolution using DFT. Response of FIR system calculation\r\nin frequency domain using DFT.', 1),
(342, 'Fast Fourier Transform', 41, 'Radix-2 DIT-FFT algorithm, DIT-FFT Flowgraph for N=4, 6 & 8, Inverse\r\nFFT algorithm. Spectral Analysis using FFT, Comparison of complex and\r\nreal, multiplication and additions of DFT and FFT.', 1),
(343, 'DSP Algorithms', 41, 'Carls Correlation Coefficient Algorithm, Fast Circular Convolution\r\nAlgorithm, Fast Linear Convolution Algorithm, Linear FIR filtering\r\nusing Fast Overlap Add Algorithm and Fast Overlap Save Algorithm', 1),
(344, 'DSP Processors and Application of DSP', 41, 'Need for Special architecture of DSP processor, Difference between DSP\r\nprocessor & microprocessor, A general DSP processor TMS320C54XX\r\nseries, Case study of Real Time DSP applications to Speech Signal\r\nProcessing and Biomedical Signal Processing', 1),
(345, 'Introduction', 42, 'Security Attacks, Security Goals, Computer criminals, Methods of\r\ndefense, Security Services, Security Mechanisms', 1),
(346, 'Basics of Cryptography', 42, 'Symmetric Cipher Model, Substitution Techniques, Transportation\r\nTechniques, Other Cipher Properties- Confusion, Diffusion, Block and\r\nStream Ciphers', 1),
(347, 'Secret Key Cryptography', 42, 'Data Encryption Standard(DES), Strength of DES, Block Cipher\r\nDesign Principles and Modes of Operations, Triple DES, International\r\nData Encryption algorithm, Blowfish, CAST-128.', 1),
(348, 'Public Key Cryptography', 42, 'Principles of Public Key Cryptosystems, RSA Algorithm, Diffie-\r\nHellman Key Exchange', 1),
(349, 'Cryptographic Hash Functions', 42, 'Applications of Cryptographic Hash Functions, Secure Hash\r\nAlgorithm, Message Authentication Codes  Message Authentication\r\nRequirements and Functions, HMAC, Digital signatures, Digital\r\nSignature Schemes, Authentication Protocols, Digital Signature\r\nStandards.', 1),
(350, 'Authentication Applications', 42, 'Kerberos, Key Management and Distribution, X.509 Directory\r\nAuthentication service, Public Key Infrastructure, Electronic Mail\r\nSecurity: Pretty Good Privacy, S/MIME', 1),
(351, 'Program Security,Operating System Security,Database Security and IDS and Firewalls', 42, 'Secure programs, Nonmalicious Program Errors, Malicious Software \r\nTypes, Viruses, Virus Countermeasures, Worms, Targeted Malicious\r\nCode, Controls against Program Threats.\r\n\r\nMemory and Address protection, File Protection Mechanism, User\r\nAuthentication.\r\n\r\nSecurity Requirement, Reliability and Integrity, Sensitive data, Inference,\r\nMultilevel Databases\r\n\r\nIntruders, Intrusion Detection, Password Management, Firewalls-\r\nCharacteristics, Types of Firewalls, Placement of Firewalls, Firewall\r\nConfiguration, Trusted systems.', 1),
(352, 'IP Security and Non-cryptographic protocol Vulnerabilities', 42, 'Overview, Architecture, Authentication Header, Encapsulating Security\r\nPayload, Combining security Associations, Internet Key Exchange, Web\r\nSecurity: Web Security Considerations, Secure Sockets Layer and\r\nTransport Layer Security, Electronic Payment.\r\n\r\nDoS, DDoS, Session Hijacking and Spoofing, Software Vulnerabilities-\r\nPhishing, Buffer Overflow, Format String Attacks, SQL Injection.', 1),
(353, 'Introduction to Artificial Intelligence', 43, 'Introduction , History of Artificial Intelligence, Intelligent\r\nSystems: Categorization of Intelligent System, Components\r\nof AI Program, Foundations of AI, Sub-areas of AI,\r\nApplications of AI, Current trends in AI.', 1),
(354, 'Intelligent Agents', 43, 'Agents and Environments, The concept of rationality, The\r\nnature of environment, The structure of Agents, Types of\r\nAgents, Learning Agent.', 1),
(355, 'Problem solving', 43, '1 Solving problem by Searching : Problem Solving Agent,\r\nFormulating Problems, Example Problems.\r\n2 Uninformed Search Methods: Breadth First Search (BFS),\r\nDepth First Search (DFS) , Depth Limited Search, Depth\r\nFirst Iterative Deepening(DFID), Informed Search Methods:\r\nGreedy best first Search ,A* Search , Memory bounded\r\nheuristic Search.\r\n3 Local Search Algorithms and Optimization Problems: Hillclimbing\r\nsearch Simulated annealing, Local beam search,Genetic algorithms\r\n4 Adversarial Search: Games, Optimal strategies, The\r\nminimax algorithm , Alpha-Beta Pruning.', 1);
INSERT INTO `chapter` (`Chp_id`, `chapterName`, `Subj_id`, `description`, `common`) VALUES
(356, 'Knowledge and Reasoning', 43, '1 Knowledge based Agents, The Wumpus World, The\r\nPropositional logic, First Order Logic: Syntax and Semantic,\r\nInference in FOL, Forward chaining, backward Chaining.\r\n2 Knowledge Engineering in First-Order Logic, Unification,\r\nResolution, Introduction to logic programming (PROLOG).\r\n3 Uncertain Knowledge and Reasoning:\r\nUncertainty, Representing knowledge in an uncertain\r\ndomain, The semantics of belief network, Inference in belief\r\nnetwork.', 1),
(357, 'Planning and Learning', 43, '1 The planning problem, Planning with state space search,\r\nPartial order planning, Hierarchical planning, Conditional\r\nPlanning.\r\n2 Learning: Forms of Learning, Inductive Learning, Learning\r\nDecision Tree.\r\n3 Expert System: Introduction, Phases in building Expert\r\nSystems, ES Architecture, ES vs Traditional System.', 1),
(358, 'Applications', 43, 'Natural Language Processing(NLP), Expert Systems', 1),
(359, 'Introduction', 45, 'Asymptotic notations Big O, Big Q,Big W,o ,w \r\nnotations ,Proofs of master theorem, applying\r\ntheorem to solve problems', 1),
(360, 'Advanced Data Structures', 45, '1 Red-Black Trees: properties of red-black trees , Insertions ,\r\nDeletions\r\n2 B-Trees and its operations\r\n3 Binomial Heaps: Binomial trees and binomial heaps, Operation\r\non Binomial heaps', 1),
(361, 'Dynamic Programing', 45, 'matrix chain multiplication, cutting rod problem and its analysis', 1),
(362, 'Graph algorithms', 45, 'Bellman ford algorithm, Dijkstra algorithm, Johnsons All pair\r\nshortest path algorithm for sparse graphs', 1),
(363, 'Maximum Flow', 45, 'Flow networks , the ford Fulkerson method ,max bipartite\r\nmatching , push Relabel Algorithm , The relabel to front\r\nalgorithm', 1),
(364, 'Linear Programing', 45, 'Standard and slack forms, Formulating problems as linear\r\nprograms, simplex algorithm, Duality, Initial basic feasible\r\nsolution', 1),
(365, 'Computational Ggeometry', 45, 'Line Segment properties, Determining whether any pair of\r\nsegment intersects, finding the convex hull, Finding the closest\r\npair of points.', 1),
(366, 'Digital Image and Video Fundamentals', 47, 'Introduction to Digital Image, Digital Image Processing System,\r\nSampling and Quantization, Representation of Digital Image,\r\nConnectivity, Image File Formats : BMP, TIFF and JPEG. Colour Models\r\n(RGB, HSI, YUV) Introduction to Digital Video, Chroma Sub-sampling,\r\nCCIR standards for Digital Video', 1),
(367, 'Image Enhancement', 47, 'Gray Level Transformations, Zero Memory Point Operations, Histogram\r\nProcessing, Neighbourhood Processing, Spatial Filtering, Smoothing and\r\nSharpening Filters. Homomorphic Filtering', 1),
(368, 'Image Segmentation and Representation', 47, 'Detection of Discontinuities, Edge Linking using Hough Transform,\r\nThresholding, Region based Segmentation, Split and Merge Technique,\r\nImage Representation and Description, Chain Code, Polygonal\r\nRepresentation, Shape Number, Moments.', 1),
(369, 'Image Transform', 47, 'Introduction to Unitary Transform, Discrete Fourier Transform(DFT),\r\nProperties of DFT, Fast Fourier Transform(FFT), Discrete Hadamard\r\nTransform(DHT), Fast Hadamard Transform(FHT), Discrete Cosine\r\nTransform(DCT), Discrete Wavelet Transform(DWT)', 1),
(370, 'Image Compression', 47, '1 Introduction, Redundancy, Fidelity Criteria,\r\n2 Lossless Compression Techniques : Run Length Coding, Arithmetic\r\nCoding, Huffman Coding, Differential PCM,\r\n3 Lossy Compression Techniques: Improved Gray Scale Quantization,\r\nVector Quantization, JPEG, MPEG-1.', 1),
(371, 'Binary Image Processing', 47, 'Binary Morphological Operators, Hit-or-Miss Transformation, Boundary\r\nExtraction, Region Filling, Thinning and Thickening, Connected\r\nComponent Labeling, Iterative Algorithm and Classical Algorithm', 1),
(372, 'Basic Concepts', 48, '1 Concepts of Software Architecture\r\n2 Models.\r\n3 Processes.\r\n4 Stakeholders', 1),
(373, 'Designing Architectures', 48, '1 The Design Process.\r\n2 Architectural Conception.\r\n3 Refined Experience in Action: Styles and Architectural Patterns.\r\n4 Architectural Conception in Absence of Experience.', 1),
(374, 'Connectors', 48, '1 Connectors in Action: A Motivating Example.\r\n2 Connector Foundations.\r\n3 Connector Roles.\r\n4 Connector Types and Their Variation Dimensions.\r\n5 Example Connectors.', 1),
(375, 'Modeling', 48, '1 Modeling Concepts.\r\n2 Ambiguity, Accuracy, and Precision.\r\n3 Complex Modeling: Mixed Content and Multiple Views.\r\n4 Evaluating Modeling Techniques.\r\n5 Specific Modeling Techniques.', 1),
(376, 'Analysis', 48, '1 Analysis Goals.\r\n2 Scope of Analysis.\r\n3 Architectural Concern being Analyzed.\r\n5.4 Level of Formality of Architectural Models.\r\n5 Type of Analysis.\r\n6 Analysis Techniques.', 1),
(377, 'Implementation and Deployment', 48, '1 Concepts.\r\n2 Existing Frameworks.\r\n3 Software Architecture and Deployment.\r\n4 Software Architecture and Mobility.', 1),
(378, 'Conventional Architectural styles', 48, '1 Pipes and Filters\r\n2 Event- based, Implicit Invocation\r\n3 Layered systems\r\n4 Repositories\r\n5 Interpreters\r\n6 Process control', 1),
(379, 'Applied Architectures and Styles', 48, '1 Distributed and Networked Architectures.\r\n2 Architectures for Network-Based Applications.\r\n3 Decentralized Architectures.\r\n4 Service-Oriented Architectures and Web Services.', 1),
(380, 'Designing for Non-Functional Properties', 48, '1 Efficiency.\r\n2 Complexity.\r\n3 Scalability and Heterogeneity.\r\n4 Adaptability.\r\n5 Dependability.', 1),
(381, 'Domain-Specific Software Engineering', 48, '1 Domain-Specific Software Engineering in a Nutshell.\r\n2 Domain-Specific Software Architecture.\r\n3 DSSAs, Product Lines, and Architectural Styles.', 1),
(382, 'Introduction to Soft Computing', 49, 'Soft computing Constituents, Characteristics of Neuro\r\nComputing and Soft Computing, Difference between Hard\r\nComputing and Soft Computing, Concepts of Learning and\r\nAdaptation', 1),
(383, 'Neural Networks', 49, '1 Basics of Neural Networks:\r\nIntroduction to Neural Networks, Biological Neural\r\nNetworks, McCulloch Pitt model,\r\n2 Supervised Learning algorithms:\r\nPerceptron (Single Layer, Multi layer), Linear separability,\r\nDelta learning rule, Back Propagation algorithm,\r\n3 Un-Supervised Learning algorithms: Hebbian Learning,\r\nWinner take all, Self Organizing Maps, Learning Vector\r\nQuantization.', 1),
(384, 'Fuzzy Set Theory', 49, 'Classical Sets and Fuzzy Sets, Classical Relations and Fuzzy\r\nRelations, Properties of membership function, Fuzzy\r\nextension principle, Fuzzy Systems- fuzzification,\r\ndefuzzification and fuzzy controllers.', 1),
(385, 'Hybrid system', 49, 'Introduction to Hybrid Systems, Adaptive Neuro Fuzzy Inference System(ANFIS).', 1),
(386, 'Introduction to Optimization Techniques', 49, '1 Derivative based optimization- Steepest Descent, Newton\r\nmethod.\r\n2 Derivative free optimization- Introduction to Evolutionary\r\nConcepts.', 1),
(387, 'Genetic Algorithms and its applications:', 49, 'Inheritance Operators, Cross over types, inversion and\r\nDeletion, Mutation Operator, Bit-wise Operators,\r\nConvergence of GA, Applications of GA.', 1),
(388, 'Introduction', 50, 'What is an Enterprize, Introduction to ERP, Need for ERP,\r\nStructure of ERP, Scope and Benefits, Typical business\r\nprocesses.', 1),
(389, 'ERP and Technology', 50, 'ERP and related technologies, Business Intelligence, E-business\r\nand E-commerce, Business Process Reengineering', 1),
(390, 'ERP and Implementation', 50, 'ERP implementation and strategy, Implementation Life cycle,\r\nPre-implementation task, requirement definition , implementation\r\nmethodology', 1),
(391, 'ERP Business Modules', 50, 'Modules: Finance, manufacturing, human resources, quality\r\nmanagement, material management, marketing. Sales distribution\r\nand service.', 1),
(392, 'Extended ERP', 50, 'Enterprise application Integration (EAI), open source ERP, cloud\r\nERP.', 1),
(393, 'Introduction and strategic decisions in SCM', 50, 'Introduction to SCM, Generic Types of supply chain, Major\r\nDrivers of Supply chain, Strategic decisions in SCM, Business\r\nStrategy, CRM strategy, SRM strategy, SCOR model.', 1),
(394, 'Information Technology in SCM', 50, 'Types of IT Solutions like Electronic Data Inter change (EDI),\r\nIntranet/ Extranet, Data Mining/ Data Warehousing and Data\r\nMarts, E-Commerce, E- Procurement, Bar coding, RFID, QR\r\ncode.', 1),
(395, 'Mathematical modelling for SCM', 50, 'Introduction, Considerations in modelling SCM systems,\r\nStructuring the logistics chain, overview of models: models on\r\ntransportation problem, assignment problem, vehicle routing\r\nproblem, Model for vendor analysis, Make versus buy model', 1),
(396, 'Agile Supply Chain', 50, 'Introduction, Characteristics of Agile Supply Chain, Achieving\r\nAgility in Supply Chain.', 1),
(397, 'Cases of Supply Chain', 50, 'Cases of Supply Chain like, News Paper Supply Chain, Book\r\nPublishing, Mumbai Dabbawala, Disaster management, Organic\r\nFood, Fast Food', 1),
(398, 'Introduction', 46, 'Introduction to Simulation.\r\nSimulation Examples.\r\nGeneral Principles', 1),
(399, 'Models', 46, 'Statistical Models in simulation.\r\nQueuing Models', 1),
(400, 'Random Number Generation', 46, 'Testing random numbers \r\nRandom Variate Generation: Inverse transform technique,\r\nDirect Transformation for the Normal Distribution,\r\nConvolution Method, Acceptance-Rejection Technique (only Poisson\r\nDistribution).', 1),
(401, 'Analysis of simulation data', 46, 'Input Modeling ,Verification, Calibration\r\nand Validation of Simulation , Models , Estimation of absolute\r\nperformance.', 1),
(402, 'Application', 46, 'Case study on 1. Processor and Memory simulation\r\n2. Manufacturing & Material handling', 1),
(403, 'to gather information about the networks by\r\nusing different n/w reconnaissance tools.', 44, 'Study the use of network reconnaissance tools like WHOIS, dig, traceroute,\r\nnslookup to gather information about networks and domain registrars.', 1),
(404, 'To observe the performanance in promiscuous & non- promiscous mode  ', 44, 'Study of packet sniffer tools like wireshark, ethereal, tcpdump etc. You\r\nshould be able to use the tools to do the following\r\n1. Observer performance in promiscuous as well as non-promiscous mode.\r\n2. Show that packets can be traced based on different filters.', 1),
(405, 'To learn nmap installation & use this to scan different ports.', 44, 'Download and install nmap. Use it with different options to scan open ports,\r\nperform OS fingerprinting, do a ping scan, tcp port scan, udp port scan, etc.', 1),
(406, 'To find ARP spoofing using open source.', 44, 'Detect ARP spoofing using open source tool ARPWATCH.', 1),
(407, 'scan system and network analysis.', 44, 'Use the Nessus tool to scan the network for vulnerabilities.', 1),
(408, 'To check buffer overflow in an NS2 environment', 44, 'Implement a code to simulate buffer overflow attack.', 1),
(409, 'implementing security vulnerabilities', 44, 'Set up IPSEC under LINUX', 1),
(410, 'Simulate intrusion detection system using tools such as snort', 44, 'Install IDS (e.g. SNORT) and study the logs.', 1),
(411, 'To study how to create and destroy firewall security parameters.', 44, 'Use of iptables in linux to create firewalls.', 1),
(412, 'To implement Networking concepts', 44, 'Mini project', 1),
(413, 'Introduction to Data Warehousing', 51, 'The Need for Data Warehousing; Increasing Demand for Strategic\r\nInformation; Inability of Past Decision Support System; Operational V/s\r\nDecisional Support System; Data Warehouse Defined; Benefits of Data\r\nWarehousing ;Features of a Data Warehouse; The Information Flow\r\nMechanism; Role of Metadata; Classification of Metadata; Data Warehouse\r\nArchitecture; Different Types of Architecture; Data Warehouse and Data\r\nMarts; Data Warehousing Design Strategies.', 1),
(414, 'Dimensional Modeling', 51, 'Data Warehouse Modeling Vs Operational Database Modeling; Dimensional\r\nModel Vs ER Model; Features of a Good Dimensional Model; The Star\r\nSchema; How Does a Query Execute? The Snowflake Schema; Fact Tables\r\nand Dimension Tables; The Factless Fact Table; Updates To Dimension\r\nTables: Slowly Changing Dimensions, Type 1 Changes, Type 2 Changes,\r\nType 3 Changes, Large Dimension Tables, Rapidly Changing or Large\r\nSlowly Changing Dimensions, Junk Dimensions, Keys in the Data\r\nWarehouse Schema, Primary Keys, Surrogate Keys & Foreign Keys;\r\nAggregate Tables; Fact Constellation Schema or Families of Star.', 1),
(415, 'ETL Process', 51, 'Challenges in ETL Functions; Data Extraction; Identification of Data\r\nSources; Extracting Data: Immediate Data Extraction, Deferred Data\r\nExtraction; Data Transformation: Tasks Involved in Data Transformation,\r\nData Loading: Techniques of Data Loading, Loading the Fact Tables and\r\nDimension Tables Data Quality; Issues in Data Cleansing.', 1),
(416, 'Online Analytical Processing (OLAP)', 51, 'Need for Online Analytical Processing; OLTP V/s OLAP; OLAP and\r\nMultidimensional Analysis; Hypercubes; OLAP Operations in\r\nMultidimensional Data Model; OLAP Models: MOLAP, ROLAP, HOLAP,\r\nDOLAP', 1),
(417, 'Introduction to data mining', 51, 'What is Data Mining; Knowledge Discovery in Database (KDD), What can\r\nbe Data to be Mined, Related Concept to Data Mining, Data Mining\r\nTechnique, Application and Issues in Data Mining', 1),
(418, 'Data Exploration', 51, 'Types of Attributes; Statistical Description of Data; Data Visualization;\r\nMeasuring similarity and dissimilarity', 1),
(419, 'Data Preprocessing', 51, 'Why Preprocessing? Data Cleaning; Data Integration; Data Reduction:\r\nAttribute subset selection, Histograms, Clustering and Sampling; Data\r\nTransformation & Data Discretization: Normalization, Binning, Histogram\r\nAnalysis and Concept hierarchy generation.', 1),
(420, 'Classification', 51, '1 Basic Concepts; Classification methods:\r\n1.1 Decision Tree Induction: Attribute Selection Measures, Tree\r\npruning.\r\n1.2 Bayesian Classification: Naive Bayes Classifier.\r\n2 Prediction: Structure of regression models; Simple linear regression,\r\nMultiple linear regression.\r\n3 Model Evaluation & Selection: Accuracy and Error measures, Holdout,\r\nRandom Sampling, Cross Validation, Bootstrap; Comparing Classifier\r\nperformance using ROC Curves.\r\n4 Combining Classifiers: Bagging, Boosting, Random Forests.', 1),
(421, 'Clustering', 51, 'What is clustering? Types of data, Partitioning Methods (K-Means, KMedoids)\r\nHierarchical Methods(Agglomerative , Divisive, BRICH),\r\nDensity-Based Methods ( DBSCAN, OPTICS)', 1),
(422, 'Mining Frequent Pattern and Association Rule', 51, 'Market Basket Analysis, Frequent Itemsets, Closed Itemsets, and\r\nAssociation Rules; Frequent Pattern Mining, Efficient and Scalable Frequent\r\nItemset Mining Methods, The Apriori Algorithm for finding Frequent\r\nItemsets Using Candidate Generation, Generating Association Rules from\r\nFrequent Itemsets, Improving the Efficiency of Apriori, A pattern growth\r\napproach for mining Frequent Itemsets; Mining Frequent itemsets using\r\nvertical data formats; Mining closed and maximal patterns; Introduction to\r\nMining Multilevel Association Rules and Multidimensional Association\r\nRules; From Association Mining to Correlation Analysis, Pattern Evaluation\r\nMeasures; Introduction to Constraint-Based Association Mining.', 1),
(423, 'Introduction', 52, '1 Introduction to Human Machine Interface, Hardware, software and\r\noperating environment to use HMI in various fields.\r\n2 The psychopathology of everyday things  complexity of modern devices;\r\nhuman-centered design; fundamental principles of interaction; Psychology\r\nof everyday actions- how people do things; the seven stages of action and\r\nthree levels of processing; human error', 1),
(424, 'Understanding goal directed design', 52, 'Goal directed design; Implementation models and mental models;\r\nBeginners, experts and intermediates  designing for different experience\r\nlevels; Understanding users; Modeling users personas and goals.', 1),
(425, 'GUI', 52, 'benefits of a good UI; popularity of graphics; concept of direct\r\nmanipulation; advantages and disadvantages; characteristics of GUI;\r\ncharacteristics of Web UI; General design principles.', 1),
(426, 'Design guidelines', 52, 'perception, Gesalt principles, visual structure, reading is unnatural, color,\r\nvision, memory, six behavioral patterns, recognition and recall, learning,\r\nfactors affecting learning, time.', 1),
(427, 'Interaction styles', 52, 'menus; windows; device based controls, screen based controls', 1),
(428, 'Communication', 52, 'text messages; feedback and guidance; graphics, icons and images colours.', 1),
(429, 'Introduction', 53, 'Parallel Computing, Parallel Architecture, Architectural Classification\r\nScheme, Performance of Parallel Computers, Performance Metrics for\r\nProcessors, Parallel Programming Models, Parallel Algorithms.', 1),
(430, 'Pipeline Processing', 53, 'Introduction, Pipeline Performance, Arithmetic Pipelines, Pipelined\r\nInstruction Processing, Pipeline Stage Design, Hazards, Dynamic\r\nInstruction Scheduling', 1),
(431, 'Synchronous Parallel Processing', 53, 'Introduction, Example-SIMD Architecture and Programming Principles,\r\nSIMD Parallel Algorithms, Data Mapping and memory in array\r\nprocessors, Case studies of SIMD parallel Processors', 1),
(432, 'Introduction to Distributed Systems', 53, 'Definition, Issues, Goals, Types of distributed systems, Distributed\r\nSystem Models, Hardware concepts, Software Concept, Models of\r\nMiddleware, Services offered by middleware, Client Server model.', 1),
(433, 'Communication', 53, 'Layered Protocols, Remote Procedure Call, Remote Object Invocation,\r\nMessage Oriented Communication, Stream Oriented Communication', 1),
(434, 'Resource and Process Management', 53, 'Desirable Features of global Scheduling algorithm, Task assignment\r\napproach, Load balancing approach, load sharing approach, Introduction\r\nto process management, process migration, Threads, Virtualization,\r\nClients, Servers, Code Migration', 1),
(435, 'Synchronization', 53, '1 Clock Synchronization, Logical Clocks, Election Algorithms, Mutual\r\nExclusion, Distributed Mutual Exclusion-Classification of mutual\r\nExclusion Algorithm, Requirements of Mutual Exclusion Algorithms,\r\nPerformance measure, Non Token based Algorithms: Lamport Algorithm,\r\nRicart Agrawalas Algorithm, Maekawas Algorithm\r\n2 Token Based Algorithms: Suzuki-Kasamis Broardcast Algorithms,\r\nSinghals Heurastic Algorithm, Raymonds Tree based Algorithm,\r\nComparative Performance Analysis.', 1),
(436, 'Consistency and Replication,Distributed File Systems', 53, '1.Introduction, Data-Centric and Client-Centric Consistency Models,\r\nReplica Management.\r\n\r\n2.Introduction, good features of DFS, File models, File Accessing models,\r\nFile-Caching Schemes, File Replication, Network File System(NFS),\r\nAndrew File System(AFS), Hadoop Distributed File System and Map\r\nReduce.', 1),
(437, 'Introduction to Machine Learning', 55, 'What is Machine Learning?, Key Terminology, Types of Machine\r\nLearning, Issues in Machine Learning, Application of Machine Learning,\r\nHow to choose the right algorithm, Steps in developing a Machine\r\nLearning Application.', 1),
(438, 'Learning with Regression', 55, 'Linear Regression, Logistic Regression.', 1),
(439, 'Learning with trees', 55, 'Using Decision Trees, Constructing Decision Trees, Classification and\r\nRegression Trees (CART).', 1),
(440, 'Support Vector Machines(SVM)', 55, 'Maximum Margin Linear Separators, Quadratic Programming solution to\r\nfinding maximum margin separators, Kernels for learning non-linear\r\nfunctions.', 1),
(441, 'Learning with Classification', 55, 'Rule based classification, classification by backpropoagation, Bayesian\r\nBelief networks, Hidden Markov Models.', 1),
(442, 'Dimensionality Reduction', 55, 'Dimensionality Reduction Techniques, Principal Component Analysis,\r\nIndependent Component Analysis.', 1),
(443, 'Learning with Clustering', 55, 'K-means clustering, Hierarchical clustering, Expectation Maximization\r\nAlgorithm, Supervised learning after clustering, Radial Basis functions.', 1),
(444, 'Reinforcement Learning', 55, 'Introduction, Elements of Reinforcement Learning, Model based learning,\r\nTemporal Difference Learning, Generalization, Partially Observable\r\nStates.', 1),
(445, 'Introduction to computational technologies', 56, 'Review of computation technologies (ARM, RISC, CISC, PLD, SOC),\r\narchitecture, event managers, hardware multipliers, pipelining.\r\nHardware/Software co-design. Embedded systems architecture and design\r\nprocess.', 1),
(446, 'Program Design and Analysis', 56, 'Integrated Development Environment (IDE), assembler, linking and\r\nloading. Program-level performance analysis and optimization, energy\r\nand power analysis and program size optimization, program validation\r\nand testing. Embedded Linux, kernel architecture, GNU cross platform\r\ntool chain. Programming with Linux environment.', 1),
(447, 'Process Models and Product development life cycle management', 56, 'State machine models: finite-state machines (FSM), finite-state machines\r\nwith data-path model (FSMD), hierarchical/concurrent state machine model (HCFSM), program-state machine model (PSM), concurrent\r\nprocess model. Unified Modeling Language (UML), applications of UML\r\nin embedded systems. IP-cores, design process model. Hardware software\r\nco-design, embedded product development life cycle management.', 1),
(448, 'High Performance 32-bit RISC Architecture', 56, 'ARM processor family, ARM architecture, instruction set, addressing\r\nmodes, operating modes, interrupt structure, and internal peripherals.\r\nARM coprocessors, ARM Cortex-M3.', 1),
(449, 'Processes and Operating Systems', 56, 'Introduction to Embedded Operating System, multiple tasks and multiple\r\nprocesses. Multi rate systems, preemptive real-time operating systems,\r\npriority-based scheduling, inter-process communication mechanisms.\r\nOperating system performance and optimization strategies. Examples of\r\nreal-time operating systems.', 1),
(450, 'Real-time Digital Signal Processing (DSP)', 56, 'Introduction to Real-time simulation, numerical solution of the mathematical\r\nmodel of physical system. DSP on ARM, SIMD techniques. Correlation,\r\nConvolution, DFT, FIR filter and IIR Filter implementation on ARM. Open\r\nMultimedia Applications Platform (OMAP)', 1),
(451, 'Introduction', 57, '1 Introduction to wireless Networks. Characteristics of Wireless channel,\r\nIssues in Ad hoc wireless networks, Adhoc Mobility Models:- Indoor\r\nand outdoor models.\r\n2 Adhoc Networks: Introduction to adhoc networks  definition,\r\ncharacteristics features, applications.', 1),
(452, 'MAC Layer', 57, '1 MAC Protocols for Ad hoc wireless Networks: Introduction, Issues in\r\ndesigning a MAC protocol for Ad hoc wireless Networks, Design goals\r\nand Classification of a MAC protocol, Contention based protocols with\r\nreservation mechanisms.\r\n2 Scheduling algorithms, protocols using directional antennas. IEEE\r\nstandards: 802.11a, 802.11b, 802.11g, 802.15, 802.16, HIPERLAN.', 1),
(453, 'Network Layer', 57, '1 Routing protocols for Ad hoc wireless Networks: Introduction, Issues in\r\ndesigning a routing protocol for Ad hoc wireless Networks,\r\nClassification of routing protocols, Table driven routing protocol, Ondemand\r\nrouting protocol.\r\n2 Proactive Vs reactive routing, Unicast routing algorithms, Multicast\r\nrouting algorithms, hybrid routing algorithm, Energy aware routing\r\nalgorithm, Hierarchical Routing, QoS aware routing.', 1),
(454, 'Transport Layer\r\n', 57, 'Transport layer protocols for Ad hoc wireless Networks: Introduction,\r\nIssues in designing a transport layer protocol for Ad hoc wireless\r\nNetworks, Design goals of a transport layer protocol for Ad hoc wireless Networks, Classification of transport layer solutions, TCP over Ad hoc\r\nwireless Networks, Other transport layer protocols for Ad hoc wireless\r\nNetworks.', 1),
(455, 'Security', 57, 'Security in wireless Ad hoc wireless Networks, Network\r\nsecurity requirements, Issues & challenges in security provisioning,\r\nNetwork security attacks, Key management, Secure routing in Ad hoc\r\nwireless Networks.', 1),
(456, 'QoS', 57, 'Quality of service in Ad hoc wireless Networks: Introduction, Issues and\r\nchallenges in providing QoS in Ad hoc wireless Networks, Classification\r\nof QoS solutions, MAC layer solutions, network layer solutions.', 1),
(457, 'Introduction', 58, 'Introduction of Cybercrime: Types, The Internet spawns crime, Worms\r\nversus viruses, Computers'' roles in crimes, Introduction to digital\r\nforensics, Introduction to Incident  Incident Response Methodology \r\nSteps  Activities in Initial Response, Phase after detection of an incident.', 1),
(458, 'Initial Response and forensic duplication', 58, 'Initial Response & Volatile Data Collection from Windows system -\r\nInitial Response & Volatile Data Collection from Unix system - Forensic\r\nDuplication: Forensic duplication: Forensic Duplicates as Admissible\r\nEvidence, Forensic Duplication Tool Requirements, Creating a Forensic.', 1),
(459, 'Preserving and Recovering Digital Evidence', 58, 'FAT, NTFS  Forensic Analysis of File Systems - Storage\r\nFundamentals: Storage Layer, Hard Drives Evidence Handling: Types of\r\nEvidence, Challenges in evidence handling, Overview of evidence\r\nhandling procedure.', 1),
(460, 'Network Forensics', 58, 'Intrusion detection; Different Attacks in network, analysis Collecting\r\nNetwork Based Evidence - Investigating Routers - Network Protocols -\r\nEmail Tracing- Internet Fraud.', 1),
(461, 'System investigation', 58, 'Data Analysis Techniques and Hacker Tools', 1),
(462, 'Bodies of law', 58, 'Constitutional law, Criminal law, Civil law, Administrative regulations,\r\nLevels of law: Local laws, State laws, Federal laws, International laws ,\r\nLevels of culpability: Intent, Knowledge, Recklessness, Negligence\r\nLevel and burden of proof : Criminal versus civil cases ,Vicarious\r\nliability, Laws related to computers: CFAA, DMCA, CAN Spam, etc.', 1),
(463, 'Introduction to Big Data\r\n', 59, 'Introduction to Big Data, Big Data characteristics, types of Big Data,\r\nTraditional vs. Big Data business approach, Case Study of Big Data\r\nSolutions.', 1),
(464, 'Introduction to Hadoop', 59, 'What is Hadoop? Core Hadoop Components; Hadoop Ecosystem; Physical Architecture; Hadoop limitations.', 1),
(465, 'NoSQL', 59, '1 What is NoSQL? NoSQL business drivers; NoSQL case studies;\r\n2 NoSQL data architecture patterns: Key-value stores, Graph stores,\r\nColumn family (Bigtable) stores, Document stores, Variations of NoSQL\r\narchitectural patterns;\r\n3 Using NoSQL to manage big data: What is a big data NoSQL solution?\r\nUnderstanding the types of big data problems; Analyzing big data with a\r\nshared-nothing architecture; Choosing distribution models: master-slave\r\nversus peer-to-peer; Four ways that NoSQL systems handle big data\r\nproblems', 1),
(466, 'MapReduce and the New Software Stack', 59, '1 Distributed File Systems : Physical Organization of Compute Nodes, Large-\r\nScale File-System Organization.\r\n2 MapReduce: The Map Tasks, Grouping by Key, The Reduce Tasks\r\n3 Algorithms Using MapReduce: Matrix-Vector Multiplication by MapReduce ,\r\nRelational-Algebra Operations, Computing Selections by MapReduce,\r\nComputing Projections by MapReduce, Union, Intersection, and Difference by\r\nMapReduce, Computing Natural Join by MapReduce, Grouping and\r\nAggregation by MapReduce, Matrix Multiplication, Matrix Multiplication with One MapReduce Step', 1),
(467, 'Finding Similar Items', 59, '1 Applications of Near-Neighbor Search, Jaccard Similarity of Sets,\r\nSimilarity of Documents, Collaborative Filtering as a Similar-Sets\r\nProblem .\r\n2 Distance Measures: Definition of a Distance Measure, Euclidean\r\nDistances, Jaccard Distance, Cosine Distance, Edit Distance, Hamming\r\nDistance.', 1),
(468, 'Mining Data Streams', 59, '1 The Stream Data Model: A Data-Stream-Management System,\r\nExamples of Stream Sources, Stream Querie, Issues in Stream Processing.\r\n2 Sampling Data in a Stream : Obtaining a Representative Sample , The\r\nGeneral Sampling Problem, Varying the Sample Size.\r\n3 Filtering Streams:\r\nThe Bloom Filter, Analysis.\r\n4 Counting Distinct Elements in a Stream\r\nThe Count-Distinct Problem, The Flajolet-Martin Algorithm, Combining\r\nEstimates, Space Requirements .\r\n5 Counting Ones in a Window:\r\nThe Cost of Exact Counts, The Datar-Gionis-Indyk-Motwani Algorithm,\r\nQuery Answering in the DGIM Algorithm, Decaying Windows', 1),
(469, 'Link Analysis', 59, 'PageRank Definition, Structure of the web, dead ends, Using Page rank\r\nin a search engine, Efficient computation of Page Rank: PageRank\r\nIteration Using MapReduce, Use of Combiners to Consolidate the Result\r\nVector.', 1),
(470, 'Frequent Itemsets', 59, '1 Handling Larger Datasets in Main Memory\r\nAlgorithm of Park, Chen, and Yu, The Multistage Algorithm, The Multihash\r\nAlgorithm.\r\n2 The SON Algorithm and MapReduce\r\n3 Counting Frequent Items in a Stream\r\nSampling Methods for Streams, Frequent Itemsets in Decaying Windows', 1),
(471, 'Clustering', 59, 'CURE Algorithm, Stream-Computing , A Stream-Clustering Algorithm,\r\nInitializing & Merging Buckets, Answering Queries', 1),
(472, 'Recommendation Systems', 59, 'A Model for Recommendation Systems, Content-Based Recommendations, Collaborative Filtering.', 1),
(473, 'Mining Social-Network Graphs', 59, 'Social Networks as Graphs, Clustering of Social-Network Graphs, Direct Discovery of Communities, SimRank, Counting triangles using Map Reduce', 1),
(474, 'Study of Cloud Computing & Architecture.', 54, 'Objective of this module is to provide students an overview\r\nof the Cloud Computing and Architecture and different types of Cloud\r\nComputing', 1),
(475, 'Virtualization in Cloud.', 54, 'In this module students will learn, Virtualization Basics, Objectives of Virtualization, and Benefits of Virtualization in cloud.', 1),
(476, 'Study and implementation of Infrastructure as a Service', 54, 'In this module student will learn Infrastructure as a Service and implement it by using OpenStack.', 1),
(477, 'Study and installation of Storage as Service', 54, 'students must be able to understand the concept of SaaS , and how it is implemented using ownCloud which gives universal access to files through a web interface.', 1),
(478, 'Implementation of identity management.', 54, 'this lab gives an introduction about identity management in\r\ncloud and simulate it by using OpenStack', 1),
(479, 'Crystal Structure', 88, 'Crystallography: Space lattice, Unit Cell, Lattice parameters, Bravais lattices and Crystal systems, Cubic\r\ncrystal system & lattices; Density & Packing Fraction; Miller indices of crystallographic planes &\r\ndirections; interplanar distance; Diamond structure, NaCl structure, HCP structure, BaTiO3 structure;\r\nLigancy and Critical radius ratio; Determination of crystal structure using X-ray diffraction techniques\r\nviz. Laue method, rotating crystal method (Bragg method) & powder method; Real crystals & pointdefects; photonic crystals; Liquid crystal phases and application in LCD ( with brief introduction of\r\noptical polarization).', 1),
(480, 'Semiconductor Physics', 88, 'Energy bands of solids and classification of solids; Concepts of holes, effective mass; drift mobility and\r\nconductivity in conductors, intrinsic semiconductors and extrinsic semiconductors; Fermi-Dirac\r\ndistribution function and Fermi energy level in a conductor, insulator, intrinsic & extrinsic\r\nsemiconductor; Effect of impurity concentration and temperature on the Fermi Level; Hall Effect (applied\r\nelectric field along x-axis and applied magnetic field along z-axis) and its application.', 1),
(481, 'Dielectrics and Magnetic Materials', 88, 'Dielectric material, dielectric constant, polarization, polarizability & its types; relative permittivity;\nPiezoelectrics, Ferroelectrics, Applications of dielectric materials - Requirement of good insulating\nmaterial, some important insulating material. Origin of magnetization using Atomic Theory; classification of magnetic materials based on\nSusceptibility value; Qualitative treatment of Langevin''s and Weiss equation for Dia, Para and Ferro\nmagnetic materials (no derivation); Microstructure of ferromagnetic solids- Domains and Hysteresis loss;\nSoft & hard magnetic materials and their uses; Magnetic circuits and microscopic Ohm''s Law.', 1),
(482, 'Acoustics and Ultrasonics', 88, 'ntroduction to architectural acoustics; reverberation and Sabine''s formula; Common Acoustic defects\nand Acoustic Design of a hall. Ultrasonic Waves and their applications; Methods of production of ultrasonic waves (Piezoelectric\nOscillator & Magnetostriction Oscillator). ', 1),
(483, 'Water', 89, 'Impurities in water, Hardness of water, Determination of Hardness of\r\nwater by EDTA method and problems. Softening of water by Hot cold\r\nlime soda method and problems. Zeolite process and problems. Ion\r\nExchange process and problems. Drinking water or Municipal water, Treatments removal of\r\nmicroorganisms, by adding Bleaching powder, Chlorination ( no\r\nbreakpoint chlorination), Disinfection by Ozone, Electrodialysis and\r\nReverse osmosis, ultra filtration. BOD, COD( def,& significance), sewage treatments activated sludge\r\nprocess, numerical problems related to COD.', 1),
(484, 'Polymers', 89, 'Introduction to polymers, Thermoplastic and Thermosetting plastic. \r\nIngredients of the plastic (Compounding of plastic.). Fabrication of plastic by Compression, Injection , Transfer, Extrusion\r\nmolding. Preparation, properties and uses of Phenolformaldehyde,\r\nPMMA , Kevlar. Effect of heat on the polymers (Glass transition temperatures)\r\nPolymers in medicine and surgery. Conducting polymers, Industrial polymers. Rubbers', 1),
(485, 'Lubricants', 89, 'Introduction , Definition, Mechanism of Lubrication, Classification of\r\nlubricants, Solid lubricants (graphite & Molybdenum disulphide ) ,\r\nSemisolid lubricants (greases Na base , Li base , Ca base, Axle greases.) ,\r\nLiquid lubricants( blended oils ).\r\n• Important properties of lubricants , definition and significance\r\n,viscosity ,viscosity index, flash and fire points, cloud and pour points,\r\noiliness, Emulsification, Acid value and problems, Saponification value\r\nand problems .', 1),
(486, 'Phase Rule', 89, 'Gibb’s Phase Rule, Explanation, One Component System (Water) ,\r\nReduced Phase Rule, Two Component System, Limitations of\r\nPhase Rule.', 1),
(487, 'Important Engineering Materials', 89, 'Cement? Manufacture of Portland Cement, Chemical Composition and\r\nConstitution of Portland Cement , Setting and Hardening of Portland\r\nCement, Concrete RCC and Decay. Refractories Preparation,\r\nproperties and uses of Silica bricks, Dolomite bricks , Silicon Carbide\r\n(SiC). Nanomaterials , preparation (Laser and CVD method), properties and\r\nuses of CNTS', 1),
(488, 'System of Coplanar Forces', 90, 'Center of Gravity and Centroid for plane Laminas.', 1),
(489, 'Equilibrium of system of coplanar forces, Types of support, Analysis of plane trusses', 90, 'Condition of equilibrium for concurrent forces, parallel forces and Non\r\nconcurrent Non Parallel general forces and Couples. loads, Beams, Determination of reactions at supports\r\nfor various types of loads on beams. Analysis of plane trusses by using Method of joints and Method of\r\nsections', 1),
(490, 'Forces in space', 90, 'Resultant of Noncoplanar force systems: Resultant of Concurrent force\r\nsystem, Parallel force system and Nonconcurrent nonparallel force system. Equilibrium of Noncoplanar force systems: Equilibrium of Concurrent force\r\nsystem, Parallel force system and Nonconcurrent nonparallel force system. Friction:\r\nIntroduction to Laws of friction, Cone of friction, Equilibrium of bodies on\r\ninclined plane, Application to problems involving wedges, ladders.', 1),
(491, 'Kinematics of Particle', 90, 'Velocity & acceleration in terms of rectangular\r\nco-ordinate system, Rectilinear motion, Motion along plane curved path,\r\nTangential & Normal component of acceleration, Motion curves (a-t, v-t, s-t\r\ncurves), Projectile motion, Relative velocities.', 1),
(492, 'Kinematics of Rigid Bodies', 90, 'Introduction to general plane motion,\r\nInstantaneous center of rotation for the velocity, velocity diagrams for bodies\r\nin plane motion, (up to 2 linkage mechanism)', 1),
(493, 'Kinematics of a Particle', 90, 'Force and acceleration: Introduction to basic\r\nconcepts, D’Alemberts Principle, Equations of dynamic equilibrium, Newton’s\r\nSecond law of motion. Work and Energy: Principle of Work and\r\nEnergy, Law of Conservation of Energy. Impulse and Momentum: Principle of Linear\r\nImpulse and Momentum. Law of Conservation of momentum. Impact and\r\ncollision.', 1),
(494, 'D.C. Circuits', 91, 'Kirchhoff ''s laws, Ideal and practical voltage and current source, Mesh and\nNodal analysis (super node and super mesh excluded), Source\ntransformation, Star-delta transformation ,Superposition theorem,\nThevenin''s theorem, Norton''s theorem, Maximum power transfer theorem', 1),
(495, 'A.C. Circuits', 91, 'Generation of alternating voltage and currents, RMS and Average value,\r\nform factor , crest factor, AC through resistance, inductance and capacitance,\r\nR-L , R-C and R-L-C series and parallel circuits, phasor diagrams , power\r\nand power factor, series and parallel resonance, Q-factor and bandwidth', 1),
(496, 'Three Phase circuits', 91, 'Three phase voltage and current generation, star and delta connections\r\n(balanced load only), relationship between phase and line currents and\r\nvoltages, Phasor diagrams, Basic principle of wattmeter, measurement of\r\npower by two wattmeter method', 1),
(497, 'Single phase transformer', 91, 'Construction, working principle, Emf equation, ideal and practical\r\ntransformer, transformer on no load and on load, phasor diagrams,\r\nequivalent circuit, O.C. and S.C test, Efficiency', 1),
(498, 'Electronics', 91, 'Semiconductor diode, Diode rectifier with R load: Half wave, full wave-\ncenter tapped and bridge configuration, RMS value and average value of\noutput voltage, ripple factor, rectification efficiency, introduction to C and L\nfilter (no derivation). CE, CB, CC transistor configuration, CE input-output\ncharacteristics.', 1),
(499, 'Multidisciplinary Nature of Environmental Studies', 92, 'Scope and Importance. Need for Public Awareness. Depleting Nature of Environmental resources such as Soil, Water,\r\nMinerals, and Forests. Global Environmental Crisis related to Population, Water, Sanitation\r\nand Land. Ecosystem: Concept, Classification, Structure of Ecosystem, overview\r\nof Food chain, Food web and Ecological Pyramid', 1),
(500, 'Sustainable Development', 92, 'Concept of sustainable development. Social, Economical and Environmental aspect of sustainable\r\ndevelopment. Control Measures: 3R (Reuse, Recovery, Recycle), Appropriate\r\nTechnology, Environmental education, Resource utilization as per the\r\ncarrying capacity', 1),
(501, 'Environmental Pollution', 92, 'Air Pollution, Water Pollution, Land Pollution, Noise Pollution and E-pollution', 1),
(502, 'Environmental Legistation', 92, 'Ministry of Environment and Forests (MoE&F). Organizational\r\nstructure of MoE&F, Functions and powers of Central Control Pollution Board, \r\nFunctions and powers of State Control Pollution Board, Environmental Clearance, Consent and Authorization Mechanism,\r\nEnvironmental Protection Act', 1),
(503, 'Renewable sources of energy', 92, 'Limitations of conventional sources of Energy, Various renewable energy sources,\r\nSolar Energy, Wind Energy, Hydel Energy, Geothermal Energy', 1),
(504, 'Environment Technology', 92, 'Role of Technology in Environment and health, Concept of Green Buildings, Indoor air pollution,\r\nCarbon Credit, Disaster Management', 1),
(505, 'Interference and Diffraction of Light', 95, 'Interference in thin film, applications of interference, \r\ndiffraction of light', 1),
(506, 'Fibre optics and Lasers', 95, 'Fibre Optics, Lasers, Applications of laser', 1),
(507, 'Quantum Mechanics', 95, 'Introduction, Wave particle duality, de Broglie wavelength; experimental verification of de\nBroglie theory; properties of matter waves; wave packet, group velocity and phase velocity; Wave\nfunction, Physical interpretation of wave function; Heisenberg''s uncertainty principle; Electron\ndiffraction experiment and Gama ray microscope experiment; Applications of uncertainty principle;\nSchrodinger''s time dependent wave equation, time independent wave equation, - Motion of free particle,\nParticle trapped in one dimensional infinite potential well.', 1),
(508, 'Motion of charged particle in electric and magnetic fields', 95, 'Electrostatic focusing; Magnetostatic focusing; Cathode ray tube (CRT); Cathod ray Oscilloscope (CRO);\r\nApplication of of CRO', 1),
(509, 'Superconductivity', 95, 'Introduction, Meissner Effect; Type I and Type II superconductors; BCS Theory(concept of Cooper pair);\r\nJosephson effect; Applications of superconductors- SQUID, MAGLEV', 1),
(510, 'Nanoscience and Nanotechnology', 95, 'Introduction to nano-science and nanotechnology; Two main approaches in nanotechnology - Bottom up technique and top down technique; Tools used in nanotechnology such as Scanning electron microscope, Scanning Tunneling Microscope, Atomic Force Microscope. Nano materials: Methods to produce nanomaterials; Applications of nanomaterials; Different forms of carbon nanoparticles, carbon nanotubes, properties and applications.', 1),
(511, 'Corrosion', 96, 'Types of Corrosion (I) Dry or Chemical Corrosion i) Due to oxygen ii)\ndue to other gases. (II) Wet or Electrochemical Corrosion : Mechanism i) Evolution of\nhydrogen type ii) Absorption of oxygen. Types of Electro-Chemical Corrosion -\nGalvanic cell corrosion, Concentration cell corrosion (differential aeration), pitting\ncorrosion, Intergranular corrosion, Stress Corrosion , Polarization. Factors affecting the rate of corrosion : Nature of metal, position in galvanic series,\npotential difference, overvoltage, relative area of the anodic and cathodic parts,\npurity of metal, nature of the corrosion product, temperature, moisture, influence of\nPH, concentrations of the electrolytes. Methods to Decrease the rate of Corrosion : Proper designing, using pure metal,\nusing metal alloys, Cathodic protection - i) Sacrificial anodic protection, ii) Impressed\ncurrent method, Anodic protection method, Metallic coatings, hot dipping ,\ngalvanizing, tinning, metal cladding, metal spraying, Electroplating, Cementation,\nOrganic Coatings ,Paints only constituents and their functions.', 1),
(512, 'Alloys', 96, 'Introduction, purpose of making alloys, Ferrous Alloys, plain carbon steel, heat\nresisting steels, stainless steels (corrosion resistant steels), effect of the alloying\nelement, Ni, Cr, Co, Mg, Mo, W, and V. Non-Ferrous Alloys: Alloys of Al - i) Duralumin ii) Magnalumin. Alloys of Cu-Brasses\n- i) Commercial brass ii) German Silver. Bronzes - i) Gun metal ii) High - phosphorus\nbronze. Alloys of pb - i) Wood''s metal. ii) Tinman''s solders. Their composition, properties & uses. Powder Metallurgy : Introduction, methods of metal powder formation (1) (a)\nMechanical pulverization (b) Atomization (c) Chemical reduction (d) Electrolytic\nprocess (e) Decomposition. (2) Mixing & blending (3) Sintering. (4) Compacting :\nVarious methods such as i) cold pressing. ii) Powder injection moulding. iii) Hot\ncompaction. Applications of powder metallurgy. Manufacture of oxide & non-oxide ceramic powders only i) Alumina ii) Silicon\nCarbide', 1),
(513, 'Fuels', 96, 'Definition, Classification of fuels - solid, Liquid & Gaseous. Calorific value - def.\nGross or Higher C.V. & Net or lower C.V. units of heat (no conversions). Dulong''s\nformula & numericals for calculations of Gross & Net C.V. Analysis of coal - i)\nProximate Analysis with numericals and its importance ii) Ultimate Analysis with\nnumericals and its importance, Characteristic properties of the good fuel. Liquid fuels, Cracking, Petrol, \nCombustion, Bio-deisel, Propellants', 1),
(514, 'Composite materials and adhesives', 96, 'Introduction, Constitution i) Matrix phase ii) Dispersed phase. Characteristic properties of composite materials Classification - A) Particle - reinforced composites i) Large - particle composites ii) Dispersion - strengthened Composites. B) Fiber - Reinforced Composites (i) Continuous aligned (ii) Discontinuous (short) (a) aligned (b) Randomly oriented. (C) Structural Composites - (i) Laminates (ii) Sandwich Panels, Adhesive action, Physical Factors Influencing Adhesive action, Chemical Factors Influencing, Adhesive action, Bonding Processes by adhesives.', 1),
(515, 'Green Chemistry', 96, 'Introduction, Twelve Principles of Green chemistry, numericals on atom economy,\r\nsynthesis , adipic acid and indigo. Green solvents (ionic liquid supercritical CO2), and products from natural materials.', 1),
(516, 'Problem Definition', 98, '', 1),
(517, 'Algorithms', 98, 'Developing algorithms and efficiency of algorithms', 1),
(518, 'Expressing algorithm - sequence', 98, 'Expressions in C; Arithmetic and Boolean expressions, \r\nUse of Standard functions, Assignment statement, Input and output', 1),
(519, 'Concept of scalar data types', 98, 'scalar data types in C , Scope and life time, type\r\nconversion', 1),
(520, 'expressing algorithms - iteration', 98, 'Ordering a solution in a loop, C - Control structures for Iteration', 1),
(521, 'expressing algorithms - selection', 98, 'C - Control structures for selection', 1),
(522, 'Decomposition of solution', 98, 'Defining Functions in C, Functions and parameters, Introduction to recursive functions', 1),
(523, 'Additional data types', 98, 'Arrays, Strings, Structures, Files, Pointers', 1),
(524, 'Communication Theory', 99, 'The communication process, objectives, barriers to\r\ncommunication, methods of communication, formal and informal channels of\r\ncommunication in a business organization, techniques to improve communication', 1),
(525, 'Grammar and Vocabulary', 99, 'Pairs of confused words, common errors, use of articles,\nprepositions, apostrophes, agreement of the verb with the subject, one-word\nsubstitution, synonyms and antonyms', 1),
(526, 'Business Correspondence', 99, 'Principles of business correspondence, parts of a\nbusiness letter, formats, \ntypes of letters: Enquiry letters and replies to enquiry (enquiry about a product,\nservice or information, asking for a quotation, placing an order and replies to the\nsame) letters of Claim and Adjustment.', 1),
(527, 'Summarisation and Comprehension', 99, 'Technical and industry oriented passages', 1),
(528, 'Technical Writing', 99, 'Framing definitions, writing instructions, language exercises\r\nbased on types of expositions', 1),
(529, 'Beta and Gamma function, Differential under Integral sign and exact differential equation', 94, 'Beta and Gamma functions and its properties. Differentiation under integral\r\nsign with constant limits of integration. Rectification of plane curves. Differential Equation of first order and first degree?Exact differential\r\nequations, Equations reducible to exact equations by integrating factors', 1),
(530, 'Differential calculus', 94, 'Linear differential equations(Review), equation reduciable to linear form,\nBernoulli''s equation. Linear Differential Eqaution with constant coeffiecient, Cauchy''s homogeneous linear differential equation and Legendre''s\ndifferential equation, Method of variation of parameters. Simple application of differential equation of first order and second order to\nelectrical and Mechanical Engineering problem', 1),
(531, 'Numerical solution of ordinary differential equations of first order and first degree and multiple i', 94, 'Taylors series method,\r\n Eulers method, Modified Euler method, Runga-Kutta fourth order formula, Multiple Integrals', 1),
(532, 'Multiple Integrals with application and numerical integration', 94, 'Triple integration, Application to double integrals to compute Area, Mass, Volume. Application of\r\ntriple integral to compute volume, Numerical integration', 1),
(533, 'Complex Numbers', 87, 'Powers and Roots of Exponential and Trigonometric Functions. Circular functions of complex number and Hyperbolic functions.Inverse\r\nCircular and Inverse Hyperbolic functions. Logarithmic functions. Separation of real and Imaginary parts of all types of Functions. ', 1),
(534, 'Matrices and Numerical Methods', 87, 'Types of Matrices, Rank of a\r\nMatrix using Echelon forms, reduction to normal form, PAQ forms, system of\r\nhomogeneous and non - homogeneous equations, their consistency and\r\nsolutions. Linear dependent and independent vectors, Solution of system of linear algebraic equations, by (1) Gauss\r\nElimination Method (Review) (2) Guass Jordan Method (3) Crouts Method (LU)\r\n(4) Gauss Seidal Method and (5) Jacobi iteration ', 1),
(535, 'Differential Calculus', 87, 'Successive differentiation, Partial Differentiation, Euler''s Theorem on Homogeneous functions with two and three\nindependent variables (with proof).Deductions from Euler''s Theorem', 1);
INSERT INTO `chapter` (`Chp_id`, `chapterName`, `Subj_id`, `description`, `common`) VALUES
(536, 'Application of partial differentiation, expansion of function, intermediate forms and curve fitting', 87, 'Maxima and Minima of a function of two independent variables.\nLagrange''s method of undetermined multipliers with one constraint. Jacobian,\nJacobian of implicit function. Partial derivative of implicit function using\njacobian. Taylor''s Theorem, Fitting of curves by least square method for linear, parabolic, and\nexponential. Regression Analysis', 1),
(537, 'Fourier Series', 20, 'Dirichlet''s conditions, Fourier series of periodic functions, Fourier series for even and odd functions, \nHalf range sine and cosine Fourier series, Parsevel''s identities, Orthogonal and Ortho-normal functions, Complex form of Fourier\nseries, Fourier Integral Representation', 1),
(538, 'Z transform', 20, 'Z-transform of standard functions, Properties of Z-transform, Inverse Z transform', 0),
(539, 'Complex Integration', 26, 'Complex Integration - Line Integral, Cauchy''s Integral theorem for simply\nconnected regions, Cauchy''s Integral formula, Taylor''s and Laurent''s series, Zeros, poles of f(z), Residues, \nCauchy''s Residue theorem', 0),
(540, 'Matrices', 26, 'Eigen values and eigen vectors, Cayley-Hamilton theorem, Similar matrices, diagonalisable of matrix,\r\nDerogatory and non-derogatory matrices ,functions of square matrix', 0),
(541, 'Correlation', 26, 'Scattered diagrams, Karl Pearson''s coefficient of correlation, covariance, \nSpearman''s Rank correlation, regression lines', 0),
(542, 'Probability', 26, 'Baye''s Theorem, Random Variables:- discrete & continuous random variables, expectation,\nVariance, Probability Density Function & Cumulative Density Function, Moments, Moment Generating Function,\nProbability distribution: binomial distribution, Poisson & normal distribution', 0),
(543, 'Sampling theory', 26, 'Test of Hypothesis, Level of significance, Critical region, One Tailed and two\r\nTailed test, Test of significant for Large Samples:-Means of the samples and test of\r\nsignificant of means of two large samples, Test of significant of small samples:- Students t- distribution for dependent and\r\nindependent samples, Chi square test:- Test of goodness of fit and independence of attributes,\r\nContingency table', 0),
(544, 'Mathematical Programming', 26, 'Types of solution, Standard and Canonical form of LPP, Basic and feasible\r\nsolutions, simplex method, Artificial variables, Big - M method, Duality, Dual simplex method,\r\nNon Linear Programming', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chaptersinpaper`
--

CREATE TABLE IF NOT EXISTS `chaptersinpaper` (
  `ChpPaper_id` int(11) NOT NULL,
  `Paper_id` int(11) NOT NULL,
  `Chp_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chaptersinpaper`
--

INSERT INTO `chaptersinpaper` (`ChpPaper_id`, `Paper_id`, `Chp_id`) VALUES
(9, 9, 1),
(10, 9, 25),
(11, 10, 1),
(12, 11, 1),
(13, 12, 1),
(14, 12, 2),
(15, 12, 25),
(16, 12, 26),
(17, 12, 27),
(18, 12, 28),
(19, 12, 29),
(21, 14, 3),
(22, 14, 4),
(23, 15, 3),
(24, 15, 4),
(25, 16, 2),
(26, 16, 25),
(29, 19, 29),
(30, 19, 2),
(31, 20, 2),
(32, 21, 2),
(33, 22, 2),
(34, 23, 7),
(35, 24, 7),
(36, 25, 2),
(37, 26, 3),
(38, 27, 2),
(39, 28, 4),
(42, 31, 5),
(43, 31, 6),
(44, 32, 1),
(45, 32, 2),
(46, 33, 25),
(47, 33, 26),
(48, 33, 27),
(49, 33, 28),
(50, 33, 29),
(51, 33, 1),
(52, 33, 2),
(53, 34, 25),
(54, 34, 26),
(55, 34, 27),
(56, 34, 28),
(57, 34, 29),
(58, 34, 1),
(59, 34, 2),
(60, 34, 25),
(61, 34, 26),
(62, 34, 27),
(63, 34, 28),
(64, 34, 29),
(65, 34, 272),
(66, 34, 273),
(67, 34, 274),
(68, 35, 2),
(69, 35, 26),
(70, 36, 25),
(71, 36, 26),
(72, 37, 2),
(73, 37, 26),
(74, 38, 25);

-- --------------------------------------------------------

--
-- Table structure for table `chp_subj_mapping`
--

CREATE TABLE IF NOT EXISTS `chp_subj_mapping` (
  `Csm_id` int(11) NOT NULL,
  `Scm_id` int(11) NOT NULL,
  `Chp_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chp_subj_mapping`
--

INSERT INTO `chp_subj_mapping` (`Csm_id`, `Scm_id`, `Chp_id`) VALUES
(87, 8, 537),
(88, 8, 538),
(89, 8, 33),
(90, 8, 32),
(91, 8, 31),
(92, 14, 544),
(93, 14, 543),
(94, 14, 542),
(95, 14, 541),
(96, 14, 540),
(97, 14, 539);

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE IF NOT EXISTS `college` (
  `College_id` int(11) NOT NULL,
  `collegeName` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`College_id`, `collegeName`) VALUES
(1, 'Rizvi College Of Engineering'),
(2, 'Thadomal Shahani College Of Engineering'),
(3, 'Rajiv Gandhi Institute Of Technology'),
(4, 'Sardar Patel College Of Engineering'),
(5, 'Vidyalankar Institute Of Technology');

-- --------------------------------------------------------

--
-- Table structure for table `contactus(guest)`
--

CREATE TABLE IF NOT EXISTS `contactus(guest)` (
  `C_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `timestamp` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus(guest)`
--

INSERT INTO `contactus(guest)` (`C_id`, `name`, `email`, `message`, `timestamp`) VALUES
(1, 'Srikanth', 'pisharodysrikanth@gmail.com', 'this is a trial', 1458461914),
(2, 'Sumit', 'ksumit@gmail.com', 'this is a trial on 17/6/16', 1466130422);

-- --------------------------------------------------------

--
-- Table structure for table `contactus(user)`
--

CREATE TABLE IF NOT EXISTS `contactus(user)` (
  `C_id` int(11) NOT NULL,
  `L_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `timestamp` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus(user)`
--

INSERT INTO `contactus(user)` (`C_id`, `L_id`, `message`, `timestamp`) VALUES
(1, 1, 'ad', 1458461774),
(2, 1, 'trial trial', 1458461976),
(3, 1, 'trial\r\n\r\n', 1458462120),
(4, 1, 'Testing phase', 1461052173),
(5, 1, 'hello i m from fsociety', 1461156239),
(6, 1, 'Fsociety sucks!!!!!!!!!!!!!!!!!!!!!', 1461156292),
(7, 1, 'this is a trial msg', 1465574365),
(8, 1, 'this is to try that every thing is working ', 1465744229),
(9, 1, 'sdfghj', 1467986172);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `Course_id` int(11) NOT NULL,
  `courseName` varchar(150) NOT NULL,
  `semNo` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Course_id`, `courseName`, `semNo`, `description`) VALUES
(1, 'Computer Engineering', 8, 'Computer engineering is a discipline that integrates several fields of electrical engineering and computer science required to develop computer hardware and software.'),
(2, 'Electrical Engineering', 8, 'Electrical engineering is a field of engineering that generally deals with the study and application of electricity, electronics, and electromagnetism.'),
(4, 'independent', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `F_id` int(11) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `L_id` int(11) NOT NULL,
  `timestamp` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`F_id`, `feedback`, `L_id`, `timestamp`) VALUES
(1, 'the site is good but has some errors', 1, 0),
(2, 'lot of more improvement is required', 2, 1454423255),
(3, 'i loved the site and will surely visit again', 3, 1454426255),
(4, 'awesome site but has some bugs', 4, 0),
(5, '', 1, 1455239516),
(6, '', 1, 1455239527),
(7, 'check check check', 2, 1455364039),
(8, 'asd', 2, 1455364088),
(9, 'asd', 1, 1457746875),
(10, 'its an awesome site', 3, 1462187107),
(11, 'this id the feedback', 1, 1465574205),
(12, 'nnnn', 1, 1465574348),
(13, '<b>hi</b>', 1, 1465743860),
(14, 'lets see', 1, 1468031120);

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE IF NOT EXISTS `interests` (
  `Interest_id` int(11) NOT NULL,
  `L_id` int(11) NOT NULL,
  `Subj_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`Interest_id`, `L_id`, `Subj_id`) VALUES
(7, 4, 9),
(8, 4, 11),
(9, 5, 1),
(10, 5, 3),
(11, 9, 2),
(12, 9, 4),
(13, 10, 12),
(14, 10, 10),
(52, 3, 18),
(61, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `L_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contactNo` bigint(20) NOT NULL,
  `dob` int(11) NOT NULL,
  `U_id` int(1) NOT NULL,
  `securityQuestion` int(2) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `gender` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`L_id`, `username`, `password`, `name`, `contactNo`, `dob`, `U_id`, `securityQuestion`, `answer`, `photo`, `email`, `gender`) VALUES
(1, 'srikanth123', '296c2075a196aef15e372a68ae77477b', 'Srikanth S P', 7045890523, 823717800, 2, 1, 'Smitha', 'persons-0016_large.png', 'pisharodysrikanth@gmail.com', 'm'),
(2, 'keyur456', 'e19a91ac16816a7c9357ed166a058456', 'Keyur Chaudhari', 9874632480, 807314400, 2, 3, 'Shaktimaan', '', '', 'm'),
(3, 'saif789', '8c7682d566f21185d7dfb18e8b5f8e80', 'Saif Ali Dhuka', 7531597641, 773692200, 2, 5, 'Reema', 'sk.jpg', 'saifalidhuka@gmail.com', 'm'),
(4, 'ramesh456', 'cfcd208495d565ef66e7dff9f98764da', 'Ramesh Gupta', 7531598426, 0, 2, 1, 'Susheela', '', '', 'm'),
(5, 'shiburaj456', '2ee155309d1fe8e4f5d341e7b27b52c6', 'Shiburaj Pappu', 7412589635, 515714400, 2, 4, 'Tilak Nagar', '41-Best-and-Coolest-Collection-HD-Wallpapers-Ever-1.jpg', '', 'm'),
(7, 'manzarkhan456', 'cfcd208495d565ef66e7dff9f98764da', 'Manzar Khan', 7459853651, 0, 2, 2, 'Arya Vidyalaya', '', '', 'm'),
(8, 'rafiq456', 'cfcd208495d565ef66e7dff9f98764da', 'Rafiq Nakedar', 7812458937, 0, 2, 4, 'L.D. Marg', '', '', 'm'),
(9, 'sonali456', 'c8f8588cad16f44a22f0fb216691f666', 'Sonali Suryavanshi', 8456753159, 0, 2, 4, 'Shanti Nagar', '', '', 'f'),
(10, 'ashfaque456', 'cfcd208495d565ef66e7dff9f98764da', 'Ashfaque Shaikh', 4687921568, 0, 2, 1, 'mom', '', '', 'm'),
(11, 'dinesh46', 'cfcd208495d565ef66e7dff9f98764da', 'Dinesh Deore', 7984561239, 0, 2, 1, 'lata', '', '', 'm'),
(12, 'asmita465', 'cfcd208495d565ef66e7dff9f98764da', 'Asmita Patil', 1234567980, 0, 2, 1, 'sheela', '', '', 'f'),
(13, 'amit456', 'cfcd208495d565ef66e7dff9f98764da', 'Amit Gokhle', 4597831264, 0, 2, 1, 'seema', '', '', 'm'),
(20, 'mukesh123', 'fe9642294f8e3bdacf9de8d8caff83ad', 'Mukesh Mehra', 123, 823734000, 2, 1, 'assd', '', 'assd@assd.com', 'm'),
(23, 'asmita789', 'b6d83713a4ea4f694238d73c9368d6f8', 'asmita', 8978465213, 823734000, 2, 4, 'Ashok Nagar', '', 'asmita@assd.com', 'f'),
(24, 'asmita890', '42cde7345bd6490ee8d316fc5040bd57', 'asmita', 8978465213, 823734000, 2, 4, 'Ashok Nagar', '', 'asmita@assd.com', 'f'),
(28, 'priya123', '7815696ecbf1c96e6894b779456d330e', 'priya', 123, 492213600, 2, 1, 'asd', '', 'asds@asdsad.com', 'f'),
(29, 'priya456', '7815696ecbf1c96e6894b779456d330e', 'priya', 123, 492213600, 2, 1, 'sas', '', 'asds@asdsad.com', 'f'),
(30, 'dinesh753', '7815696ecbf1c96e6894b779456d330e', 'dinesh', 132312, -273114000, 2, 2, 'lkjhgfs', '', 'assd@assd.com', 'm'),
(32, 'jennifer123', '1660fe5c81c4ce64a2611494c439e1ba', 'Jennifer', 7415985236, 644277600, 2, 2, 'Don Bosco', '', 'asds@asdsad.com', 'f'),
(34, 'sumit', '912ec803b2ce49e4a541068d495ab570', 'sumit', 1234556756, 176581800, 2, 1, 'adfasdf', '', 'asds@asdsad.com', 'm'),
(35, 'sumit123', '834d2e39aa146c0c44b83a48669e9f2e', 'Sumit', 785493105, 770409000, 2, 3, 'superman', '', 'agarwalsumit@gmail.com', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `mcq`
--

CREATE TABLE IF NOT EXISTS `mcq` (
  `Mcq_id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `choice1` varchar(100) NOT NULL,
  `choice2` varchar(100) NOT NULL,
  `choice3` varchar(100) NOT NULL,
  `choice4` varchar(100) NOT NULL,
  `correctChoice` int(1) NOT NULL,
  `sum` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `Chp_id` int(11) NOT NULL,
  `uploadTimestamp` int(11) NOT NULL,
  `L_id` int(11) NOT NULL,
  `fake_count` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq`
--

INSERT INTO `mcq` (`Mcq_id`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `correctChoice`, `sum`, `count`, `rating`, `Chp_id`, `uploadTimestamp`, `L_id`, `fake_count`) VALUES
(1, 'What are units of data at network layer', 'packets', 'segments', 'frames', 'bits', 3, 49, 16, 3, 2, 0, 5, 0),
(2, 'Which of the following is a function of data link layer?', 'Logical addressing', 'flow control', 'segmentation', 'routing', 2, 56, 20, 3, 1, 0, 5, 0),
(3, 'Which of following is use of zachmann framework', 'for testing the system', 'for validating the requirement', 'for gathering requirement', 'framework for overall development of the syste', 4, 24, 7, 3, 3, 0, 9, 0),
(4, 'what is the use of data flow diagram', 'to show the various components of the system', 'to show the flow of data in the system', 'to describe the users in the system', 'to describe the overall system', 2, 38, 11, 3, 4, 0, 9, 0),
(5, 'Which of the following uses divide and conquer', 'maximum and minimum', 'knapsack', 'job sequencing', 'prims algorithm', 1, 10, 3, 3, 5, 0, 5, 0),
(6, 'Which of the following problems uses greedy method?', 'kruskal', 'all pair shortest path', 'optimal binary search tree', '0/1 knapsack', 1, 10, 3, 3, 6, 0, 5, 0),
(7, 'what is generalisation?', 'children to parent', 'parent to children', 'any interaction between parent and children', 'none of the above', 1, 0, 0, 0, 7, 0, 9, 0),
(8, 'What is data integrity?', 'structure of data', 'structure of database', 'security of data', 'none of the above', 3, 26, 9, 3, 25, 0, 9, 0),
(9, 'netwrok 2', '1', '2', '3', '4', 2, 29, 9, 3, 2, 0, 5, 1),
(10, 'network 3', '1', '2', '3', '4', 3, 38, 12, 3, 2, 0, 5, 3),
(11, 'this is a trial', '1', '2', '3', '4', 2, 45, 16, 3, 1, 1450782657, 5, 2),
(12, 'network 4', '1', '2', '3', '4', 2, 38, 12, 3, 2, 0, 5, 3),
(13, 'network 5', '1', '2', '3', '4', 2, 29, 9, 3, 2, 0, 5, 1),
(14, 'network 6', '1', '2', '3', '4', 1, 31, 10, 3, 2, 0, 5, 1),
(15, 'network 7', '1', '2', '3', '4', 1, 38, 12, 3, 2, 0, 5, 3),
(16, 'network 8', '1', '2', '3', '4', 3, 38, 12, 3, 2, 0, 5, 3),
(17, 'network 9', '1', '2', '3', '4', 4, 38, 12, 3, 2, 0, 5, 3),
(18, 'this is an ajax trial', '1', '2', '3', '4', 2, 10, 3, 3, 6, 1451100233, 5, 1),
(19, 'this is uploaded by a student', 'one', 'two', 'three', 'four', 3, 45, 16, 3, 1, 1457915887, 0, 3),
(20, 'this is a sooad tria', 'gfd', 'jhg', 'ewr', 'lkj', 2, 38, 11, 3, 4, 1464515653, 1, 4),
(22, 'a student is uploading a question', '1', '2', '3', '4', 1, 10, 3, 3, 5, 1458286736, 1, 1),
(23, 'this the last question ', 'as', 'a', 'as', 'asd', 1, 29, 9, 3, 2, 1465574530, 1, 1),
(30, 'trial', 'one', 'two', 'three', 'four', 1, 0, 0, 0, 3, 1465709199, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mcqinpaper`
--

CREATE TABLE IF NOT EXISTS `mcqinpaper` (
  `Mp_id` int(11) NOT NULL,
  `Paper_id` int(11) NOT NULL,
  `Mcq_id` int(11) NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcqinpaper`
--

INSERT INTO `mcqinpaper` (`Mp_id`, `Paper_id`, `Mcq_id`, `no`) VALUES
(18, 9, 2, 1),
(19, 9, 19, 2),
(20, 9, 11, 3),
(21, 9, 8, 4),
(22, 10, 11, 1),
(23, 10, 19, 2),
(24, 10, 2, 3),
(25, 11, 11, 1),
(26, 11, 19, 2),
(27, 11, 2, 3),
(28, 12, 10, 1),
(29, 12, 8, 2),
(30, 12, 19, 3),
(31, 12, 12, 4),
(32, 12, 16, 5),
(33, 12, 11, 6),
(34, 12, 17, 7),
(35, 12, 15, 8),
(36, 12, 2, 9),
(37, 12, 1, 10),
(40, 14, 3, 1),
(41, 14, 4, 2),
(42, 14, 20, 3),
(43, 15, 3, 1),
(44, 15, 4, 2),
(45, 15, 20, 3),
(46, 16, 10, 1),
(47, 16, 12, 2),
(48, 16, 16, 3),
(49, 16, 17, 4),
(50, 16, 15, 5),
(51, 16, 1, 6),
(52, 16, 14, 7),
(53, 16, 9, 8),
(54, 16, 13, 9),
(55, 16, 23, 10),
(62, 19, 12, 1),
(63, 19, 16, 2),
(64, 19, 17, 3),
(65, 19, 15, 4),
(66, 19, 10, 5),
(67, 19, 1, 6),
(68, 19, 14, 7),
(69, 19, 9, 8),
(70, 19, 13, 9),
(71, 19, 23, 10),
(72, 20, 12, 1),
(73, 20, 16, 2),
(74, 20, 17, 3),
(75, 20, 15, 4),
(76, 20, 10, 5),
(77, 20, 1, 6),
(78, 20, 14, 7),
(79, 20, 9, 8),
(80, 20, 13, 9),
(81, 20, 23, 10),
(82, 21, 12, 1),
(83, 21, 16, 2),
(84, 21, 17, 3),
(85, 21, 15, 4),
(86, 21, 10, 5),
(87, 21, 1, 6),
(88, 21, 14, 7),
(89, 21, 9, 8),
(90, 21, 13, 9),
(91, 21, 23, 10),
(92, 22, 12, 1),
(93, 22, 16, 2),
(94, 22, 17, 3),
(95, 22, 15, 4),
(96, 22, 10, 5),
(97, 22, 1, 6),
(98, 22, 14, 7),
(99, 22, 9, 8),
(100, 22, 13, 9),
(101, 22, 23, 10),
(102, 23, 7, 1),
(103, 24, 7, 1),
(104, 25, 12, 1),
(105, 25, 16, 2),
(106, 25, 17, 3),
(107, 25, 15, 4),
(108, 25, 10, 5),
(109, 25, 1, 6),
(110, 25, 14, 7),
(111, 25, 9, 8),
(112, 25, 13, 9),
(113, 25, 23, 10),
(114, 26, 3, 1),
(115, 27, 1, 1),
(116, 27, 9, 2),
(117, 27, 10, 3),
(118, 27, 13, 4),
(119, 27, 14, 5),
(120, 27, 15, 6),
(121, 27, 23, 7),
(122, 27, 12, 8),
(123, 27, 16, 9),
(124, 27, 17, 10),
(125, 28, 4, 1),
(126, 28, 20, 2),
(135, 31, 5, 1),
(136, 31, 22, 2),
(137, 31, 6, 3),
(138, 31, 18, 4),
(139, 32, 17, 1),
(140, 32, 10, 2),
(141, 32, 12, 3),
(142, 32, 16, 4),
(143, 32, 15, 5),
(144, 32, 2, 6),
(145, 32, 19, 7),
(146, 32, 1, 8),
(147, 32, 11, 9),
(148, 32, 14, 10),
(149, 33, 9, 1),
(150, 33, 13, 2),
(151, 33, 14, 3),
(152, 33, 23, 4),
(153, 33, 8, 5),
(154, 33, 19, 6),
(155, 33, 11, 7),
(157, 33, 33, 9),
(159, 34, 8, 1),
(160, 34, 19, 2),
(161, 34, 11, 3),
(162, 34, 2, 4),
(163, 34, 33, 5),
(164, 34, 10, 6),
(165, 34, 12, 7),
(166, 34, 16, 8),
(167, 34, 17, 9),
(168, 34, 15, 10),
(169, 35, 10, 1),
(170, 35, 12, 2),
(171, 35, 16, 3),
(172, 35, 17, 4),
(173, 35, 15, 5),
(174, 35, 1, 6),
(175, 35, 9, 7),
(176, 35, 13, 8),
(177, 35, 14, 9),
(178, 35, 23, 10),
(179, 36, 8, 1),
(180, 37, 1, 1),
(181, 37, 14, 2),
(182, 37, 13, 3),
(183, 37, 9, 4),
(184, 37, 23, 5),
(185, 37, 12, 6),
(186, 37, 10, 7),
(187, 37, 15, 8),
(188, 37, 16, 9),
(189, 37, 17, 10),
(190, 38, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mcqsappeared`
--

CREATE TABLE IF NOT EXISTS `mcqsappeared` (
  `MA_id` int(11) NOT NULL,
  `L_id` int(11) NOT NULL,
  `Mcq_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcqsappeared`
--

INSERT INTO `mcqsappeared` (`MA_id`, `L_id`, `Mcq_id`) VALUES
(10, 2, 2),
(11, 2, 19),
(12, 2, 11),
(13, 2, 8),
(68, 1, 5),
(69, 1, 22),
(70, 1, 6),
(71, 1, 18),
(72, 2, 3),
(73, 2, 4),
(74, 2, 20),
(78, 1, 24),
(79, 1, 25),
(80, 1, 26),
(99, 1, 33),
(101, 1, 27),
(102, 1, 8),
(103, 1, 11),
(104, 1, 19),
(105, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE IF NOT EXISTS `paper` (
  `Paper_id` int(11) NOT NULL,
  `timestampCreate` int(11) NOT NULL,
  `Subj_id` int(11) NOT NULL,
  `totalMarks` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `full_subj` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`Paper_id`, `timestampCreate`, `Subj_id`, `totalMarks`, `sum`, `count`, `rating`, `full_subj`) VALUES
(9, 1461985852, 1, 8, 9, 3, 3, 0),
(10, 1461990290, 1, 6, 14, 5, 3, 0),
(11, 1461990395, 1, 6, 5, 2, 3, 0),
(12, 1462002141, 1, 20, 7, 2, 4, 1),
(14, 1462067396, 2, 6, 8, 2, 4, 1),
(15, 1462148842, 2, 6, 13, 4, 3, 1),
(16, 1462149100, 1, 20, 2, 1, 2, 0),
(19, 1464856320, 1, 20, 0, 0, 0, 0),
(20, 1464940199, 1, 20, 14, 4, 4, 0),
(21, 1464941700, 1, 20, 3, 1, 3, 0),
(22, 1464948632, 1, 20, 0, 0, 0, 0),
(23, 1464955760, 4, 2, 0, 0, 0, 0),
(24, 1464955775, 4, 2, 0, 0, 0, 0),
(25, 1465017820, 1, 20, 0, 0, 0, 0),
(26, 1465017970, 2, 2, 3, 1, 3, 0),
(27, 1465101221, 1, 20, 4, 1, 4, 0),
(28, 1465101356, 2, 4, 17, 5, 3, 0),
(31, 1465866042, 3, 8, 10, 3, 3, 1),
(32, 1465867052, 1, 20, 2, 1, 2, 0),
(33, 1467079841, 1, 20, 3, 1, 3, 1),
(34, 1467986523, 1, 20, 3, 1, 3, 1),
(35, 1468029176, 1, 20, 3, 1, 3, 0),
(36, 1478779870, 1, 2, 3, 1, 3, 0),
(37, 1479049854, 1, 20, 0, 0, 0, 0),
(38, 1479110159, 1, 2, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `papersappeared`
--

CREATE TABLE IF NOT EXISTS `papersappeared` (
  `PprAppr_id` int(11) NOT NULL,
  `L_id` int(11) NOT NULL,
  `Paper_id` int(11) NOT NULL,
  `correctChoices` int(11) NOT NULL,
  `timestampAppear` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `papersappeared`
--

INSERT INTO `papersappeared` (`PprAppr_id`, `L_id`, `Paper_id`, `correctChoices`, `timestampAppear`) VALUES
(9, 2, 9, 2, 1461985852),
(10, 2, 10, 2, 1461990290),
(11, 2, 11, 2, 1461990395),
(12, 2, 15, 3, 1466406655),
(13, 2, 28, 1, 1466473588),
(31, 1, 38, 1, 1479110159),
(32, 1, 10, 2, 1479110241);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE IF NOT EXISTS `rate` (
  `rate_id` int(11) NOT NULL,
  `L_id` int(11) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`rate_id`, `L_id`, `rating`) VALUES
(3, 1, 3),
(4, 2, 4),
(5, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE IF NOT EXISTS `score` (
  `Score_id` int(11) NOT NULL,
  `L_id` int(11) NOT NULL,
  `Subj_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`Score_id`, `L_id`, `Subj_id`, `score`, `total`) VALUES
(2, 22, 2, 36, 40),
(3, 30, 1, 35, 45);

-- --------------------------------------------------------

--
-- Table structure for table `securityquestion`
--

CREATE TABLE IF NOT EXISTS `securityquestion` (
  `Security_id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `securityquestion`
--

INSERT INTO `securityquestion` (`Security_id`, `question`) VALUES
(1, 'What is your mother''s name?'),
(2, 'What was the name of your primary school?'),
(3, 'Who was your childhood hero'),
(4, 'What is the name of the street where you grew in?'),
(5, 'What was the name of your third grade teacher?');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `S_id` int(11) NOT NULL,
  `L_id` int(11) NOT NULL,
  `College_id` int(11) NOT NULL,
  `Course_id` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `qualification` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`S_id`, `L_id`, `College_id`, `Course_id`, `sem`, `qualification`) VALUES
(2, 7, 2, 1, 5, ''),
(3, 8, 3, 1, 5, ''),
(4, 1, 1, 1, 4, ''),
(5, 2, 1, 1, 5, ''),
(6, 3, 1, 1, 5, ''),
(7, 22, 1, 1, 5, ''),
(8, 30, 2, 2, 8, ''),
(10, 4, 2, 0, 0, 'B.Tech Computer Science'),
(11, 5, 1, 0, 0, 'ME Electronic'),
(12, 9, 1, 0, 0, 'BE Computer Science'),
(13, 10, 2, 0, 0, 'BE'),
(14, 11, 1, 0, 0, 'BE'),
(15, 12, 1, 0, 0, 'BE'),
(16, 13, 1, 0, 0, 'BE'),
(17, 24, 1, 0, 0, 'BE Computer Science'),
(18, 29, 1, 0, 0, 'ME Electronics'),
(19, 20, 1, 0, 0, 'BE'),
(20, 23, 1, 0, 0, 'ME'),
(21, 28, 2, 0, 0, 'B.Tech'),
(22, 32, 1, 0, 0, 'B.E. Computer Science'),
(23, 34, 2, 0, 0, ''),
(25, 35, 2, 1, 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `Subj_id` int(11) NOT NULL,
  `subjName` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `abbreviation` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subj_id`, `subjName`, `description`, `abbreviation`) VALUES
(1, 'Computer Networks', 'A computer network or data network is a telecommunications network which allows computers to exchange data. In computer networks, networked computing devices exchange data with each other using a data link. The connections between nodes are established using either cable media or wireless media. The best-known computer network is the Internet.', 'CN'),
(2, 'Structured and Object Oriented Design and Analysis', 'Object-oriented analysis and design (OOAD) is a popular technical approach for analyzing, designing an application, system, or business by applying the object-oriented paradigm and visual modeling throughout the development life cycles to foster better stakeholder communication and product quality.', 'SOOAD'),
(3, 'Analysis of Algorithms', 'In computer science, the analysis of algorithms is the determination of the amount of resources (such as time and storage) necessary to execute them. Most algorithms are designed to work with inputs of arbitrary length. Usually, the efficiency or running time of an algorithm is stated as a function relating the input length to the number of steps (time complexity) or storage locations (space complexity). Algorithm analysis is an important part of a broader computational complexity theory, which provides theoretical estimates for the resources needed by any algorithm which solves a given computational problem. These estimates provide an insight into reasonable directions of search for efficient algorithms.', 'AOA'),
(4, 'Database Management System', 'A database management system (DBMS) is a computer software application that interacts with the user, other applications, and the database itself to capture and analyze data. A general-purpose DBMS is designed to allow the definition, creation, querying, update, and administration of databases. Well-known DBMSs include MySQL, PostgreSQL, Microsoft SQL Server, Oracle, Sybase, SAP HANA, and IBM DB2.  Sometimes a DBMS is loosely referred to as a ''database''.', 'DBMS'),
(9, 'Electrical Machines - I', 'The apparatus that converts energy in three categories: generators which convert mechanical energy to electrical energy, motors which convert electrical energy to mechanical energy, and transformers which changes the voltage level of an alternating current.', 'EM-1'),
(10, 'Signal Processing', 'Signal processing is an enabling technology that encompasses the fundamental theory, applications, algorithms, and implementations of processing or transferring information contained in many different physical, symbolic, or abstract formats broadly designated as signals.', 'SP'),
(11, 'Electrical Machines - II', 'The apparatus that converts energy in three categories: generators which convert mechanical energy to electrical energy, motors which convert electrical energy to mechanical energy, and transformers which changes the voltage level of an alternating current.', 'EM-2'),
(12, 'Power Electronics', 'Power Electronics is the study of switching electronic circuits in order to control the flow of electrical energy. Power Electronics is the technology behind switching power supplies, power converters, power inverters, motor drives, and motor soft starters.', 'PE'),
(18, 'System Programming and Compiler Construction', 'A compiler is a computer program (or a set of programs) that transforms source code written in a programming language (the source language) into another computer language (the target language), with the latter often having a binary form known as object code. The most common reason for converting source code is to create an executable program.', 'SPCC'),
(20, 'Applied Mathematics III', 'Applied mathematics is a branch of mathematics that deals with mathematical methods that find use in science, engineering, business, computer science, and industry. Thus, applied mathematics is a combination of mathematical science and specialized knowledge.', 'AM-III'),
(21, 'Object Oriented Programming Methodolgy', 'A function is independent and not associated with a class. Object-oriented programming uses a number of core concepts: abstraction, encapsulation, inheritance and polymorphism. These concepts are implemented using classes, objects and methods.', 'OOPM'),
(22, 'Data Structures', 'In computer science, a data structure is a particular way of organizing data in a computer so that it can be used efficiently.', 'DS'),
(23, 'Digital Logic Design and Analysis ', 'Digital electronics or digital (electronic) circuits are electronics that handle digital signals  discrete bands of analog levels  rather than by continuous ranges (as used in analogue electronics). All levels within a band of values represent the same numeric value. Because of this discretization, relatively small changes to the analog signal levels due to manufacturing tolerance, signal attenuation or parasitic noise do not leave the discrete envelope, and as a result are ignored by signal state sensing circuitry.', 'DLDA'),
(24, 'Discrete Structures', 'Discrete mathematics is the study of mathematical structures that are fundamentally discrete rather than continuous.', 'DIS'),
(25, 'Electronic Circuits and Communication\r\nFundamentals ', 'Electronics is the science of how to control electric energy, energy in which the electrons have a fundamental role. Electronics deals with electrical circuits that involve active electrical components such as vacuum tubes, transistors, diodes and integrated circuits, and associated passive electrical components and interconnection technologies. Commonly, electronic devices contain circuitry consisting primarily or exclusively of active semiconductors supplemented with passive elements; such a circuit is described as an electronic circuit.', 'ECCF'),
(26, 'Applied Mathematics IV', '', 'AM IV'),
(28, 'Computer Organization and\r\nArchitecture', 'In computer engineering, computer architecture is a set of rules and methods that describe the functionality, organization, and implementation of computer systems. Some definitions of architecture define it as describing the capabilities and programming model of a computer but not a particular implementation. In other descriptions computer architecture involves instruction set architecture design, microarchitecture design, logic design, and implementation.', 'COA'),
(30, 'Theoretical Computer Science ', 'Theoretical computer science is a division or subset of general computer science and mathematics that focuses on more abstract or mathematical aspects of computing and includes the theory of computation.', 'TCS'),
(31, 'Computer Graphics ', 'Computer graphics are pictures and movies created using computers - usually referring to image data created by a computer specifically with help from specialized graphical hardware and software. It is a vast and recent area in computer science.The phrase was coined by computer graphics researchers Verne Hudson and William Fetter of Boeing in 1960. Another name for the field is computer-generated imagery, or simply CGI.', 'CG'),
(32, 'Microprocessor', 'A microprocessor is an electronic component that is used by a computer to do its work. It is a central processing unit on a single integrated circuit chip containing millions of very small components including transistors, resistors, and diodes that work together.', 'MP'),
(33, 'Operating Systems', 'An operating system (OS) is system software that manages computer hardware and software resources and provides common services for computer programs. The operating system is a component of the system software in a computer system. Application programs usually require an operating system to function.', 'OS'),
(35, 'Software Engineering', 'Software engineering is the application of engineering to the design, development, implementation and maintenance of software in a systematic method.', 'SE'),
(36, 'Distributed Databases', 'A distributed database is a database in which storage devices are not all attached to a common processing unit such as the CPU, and which is controlled by a distributed database management system (together sometimes called a distributed database system).', 'DD'),
(37, 'Mobile Communication and Computing', 'Mobile computing is human computer interaction by which a computer is expected to be transported during normal usage, which allows for transmission of data, voice and video. Mobile computing involves mobile communication, mobile hardware, and mobile software. Communication issues include ad hoc networks and infrastructure networks as well as communication properties, protocols, data formats and concrete technologies. Hardware includes mobile devices or device components. Mobile software deals with the characteristics and requirements of mobile applications.', 'MCC'),
(41, 'Digital Signal Processing', 'Digital signal processing (DSP) refers to various techniques for improving the accuracy and reliability of digital communications. The theory behind DSP is quite complex. Basically, DSP works by clarifying, or standardizing, the levels or states of a digital signal.', 'DSP'),
(42, 'Cryptography and System Security', 'Cryptography or cryptology is the practice and study of techniques for secure communication in the presence of third parties called adversaries. More generally, cryptography is about constructing and analyzing protocols that prevent third parties or the public from reading private messages; various aspects in information security such as data confidentiality, data integrity, authentication, and non-repudiation are central to modern cryptography. Modern cryptography exists at the intersection of the disciplines of mathematics, computer science, and electrical engineering. Applications of cryptography include ATM cards, computer passwords, and electronic commerce.', 'CSS'),
(43, 'Artificial Intelligence', 'Artificial intelligence (AI) is the intelligence exhibited by machines. In computer science, an ideal "intelligent" machine is a flexible rational agent that perceives its environment and takes actions that maximize its chance of success at an arbitrary goal.', 'AI'),
(44, 'Network Threats and Attacks Laboratory', 'Computer security, also known as cybersecurity or IT security, is the protection of information systems from theft or damage to the hardware, the software, and to the information on them, as well as from disruption or misdirection of the services they provide.\r\n\r\nIt includes controlling physical access to the hardware, as well as protecting against harm that may come via network access, data and code injection, and due to malpractice by operators, whether intentional, accidental, or due to them being tricked into deviating from secure procedures.', 'NTAL'),
(45, 'Advance Algorithms', 'In mathematics and computer science, an algorithm is a self-contained step-by-step set of operations to be performed. Algorithms perform calculation, data processing, and/or automated reasoning tasks.', 'AA'),
(46, 'Computer Simulation and Modeling', 'A computer simulation is a simulation, run on a single computer, or a network of computers, to reproduce behavior of a system. The simulation uses an abstract model (a computer model, or a computational model) to simulate the system. Computer simulations have become a useful part of mathematical modeling of many natural systems in physics (computational physics), astrophysics, climatology, chemistry and biology, human systems in economics, psychology, social science, and engineering. Simulation of a system is represented as the running of the system''s model. It can be used to explore and gain new insights into new technology and to estimate the performance of systems too complex for analytical solutions.', 'CSM'),
(47, 'Image Processing', 'In imaging science, image processing is processing of images using mathematical operations by using any form of signal processing for which the input is an image, a series of images, or a video, such as a photograph or video frame; the output of image processing may be either an image or a set of characteristics or parameters related to the image.[1] Most image-processing techniques involve treating the image as a two-dimensional signal and applying standard signal-processing techniques to it. Images are also processed as three-dimensional signals where the third-dimension being time or the z-axis.', 'IP'),
(48, 'Software Architecture', 'Software architecture refers to the high level structures of a software system, the discipline of creating such structures, and the documentation of these structures. These structures are needed to reason about the software system.', 'SA'),
(49, 'Soft Computing', 'In computer science, soft computing is the use of inexact solutions to computationally hard tasks such as the solution of NP-complete problems, for which there is no known algorithm that can compute an exact solution in polynomial time. Soft computing differs from conventional (hard) computing in that, unlike hard computing, it is tolerant of imprecision, uncertainty, partial truth, and approximation. In effect, the role model for soft computing is the human mind.', 'SC'),
(50, 'ERP and Supply Chain Management', 'Enterprise resource planning (ERP) is a category of business-management software typically a suite of integrated applications that an organization can use to collect, store, manage and interpret data from many business activities, including:\r\n\r\nproduct planning, purchase\r\nmanufacturing or service delivery\r\nmarketing and sales\r\ninventory management\r\nshipping and payment', 'ERP'),
(51, 'Data Warehouse and Mining', 'In computing, a data warehouse (DW or DWH), also known as an enterprise data warehouse (EDW), is a system used for reporting and data analysis, and is considered as a core component of Business Intelligence [1] environment. DWs are central repositories of integrated data from one or more disparate sources. They store current and historical data and are used for creating analytical reports for knowledge workers throughout the enterprise. Examples of reports could range from annual and quarterly comparisons and trends to detailed daily sales analysis.', 'DWM'),
(52, 'Human Machine Interaction', 'Human Machine Interaction, or more commonly Human Computer Interaction, is the study of interaction between people and computers. It is an interdisciplinary field, connecting computer science with many other disciplines such as psychology, sociology and the arts.', 'HMI'),
(53, 'Parallel and distributed Systems', 'Distributed computing is a field of computer science that studies distributed systems. A distributed system is a software system in which components located on networked computers communicate and coordinate their actions by passing messages.[1] The components interact with each other in order to achieve a common goal. Three significant characteristics of distributed systems are: concurrency of components, lack of a global clock, and independent failure of components.[1] Examples of distributed systems vary from SOA-based systems to massively multiplayer online games to peer-to-peer applications.', 'PDS'),
(55, 'Machine Learning', 'Machine learning is a subfield of computer science that evolved from the study of pattern recognition and computational learning theory in artificial intelligence. In 1959, Arthur Samuel defined machine learning as a "Field of study that gives computers the ability to learn without being explicitly programmed".', 'ML'),
(56, 'Embedded Systems', 'An embedded system is a computer system with a dedicated function within a larger mechanical or electrical system, often with real-time computing constraints. It is embedded as part of a complete device often including hardware and mechanical parts. Embedded systems control many devices in common use today.', 'ES'),
(57, 'Adhoc wireless networks', 'A wireless ad hoc network (WANET) is a decentralized type of wireless network. The network is ad hoc because it does not rely on a pre existing infrastructure, such as routers in wired networks or access points in managed (infrastructure) wireless networks.', 'ADHOC'),
(58, 'Digital Forensic', 'Digital forensics (sometimes known as digital forensic science) is a branch of forensic science encompassing the recovery and investigation of material found in digital devices, often in relation to computer crime.', 'DF'),
(59, 'Big data Analytics', 'Big data analytics is the process of examining large data sets containing a variety of data types -- i.e., big data -- to uncover hidden patterns, unknown correlations, market trends, customer preferences and other useful business information.', 'BDA'),
(61, 'Electronic Devices and Circuits', 'Electronics is the science of how to control electric energy, energy in which the electrons have a fundamental role. Electronics deals with electrical circuits that involve active electrical components such as vacuum tubes, transistors, diodes and integrated circuits, and associated passive electrical components and interconnection technologies. Commonly, electronic devices contain circuitry consisting primarily or exclusively of active semiconductors supplemented with passive elements; such a circuit is described as an electronic circuit.', 'EDC'),
(62, 'Conventional and Nonconventional Power Generation', 'Electricity generation is the process of generating electric power from other sources of primary energy. The fundamental principles of electricity generation were discovered during the 1820s and early 1830s by the British scientist Michael Faraday. This basic method is still used today: electricity is generated by the movement of a loop of wire, or disc of copper between the poles of a magnet.[1] For electric utilities, it is the first process in the delivery of electricity to consumers. The other processes, electricity transmission, distribution, and electrical power storage and recovery using pumped-storage methods are normally carried out by the electric power industry. Electricity is most often generated at a power station by electromechanical generators, primarily driven by heat engines fueled by chemical combustion or nuclear fission but also by other means such as the kinetic energy of flowing water and wind. Other energy sources include solar photovoltaics and geothermal power and electrochemical batteries.\r\n', 'CNPG'),
(63, 'Electrical Networks ', 'An electrical network is an interconnection of electrical components (e.g. batteries, resistors, inductors, capacitors, switches) or a model of such an interconnection, consisting of electrical elements (e.g. voltage sources, current sources, resistances, inductances, capacitances). An electrical circuit is a network consisting of a closed loop, giving a return path for the current. Linear electrical networks, a special type consisting only of sources (voltage or current), linear lumped elements (resistors, capacitors, inductors), and linear distributed elements (transmission lines), have the property that signals are linearly superimposable. They are thus more easily analyzed, using powerful frequency domain methods such as Laplace transforms, to determine DC response, AC response, and transient response.', 'EN'),
(64, 'Electrical and Electronic Measurements', 'Electrical measurements are the methods, devices and calculations used to measure electrical quantities. Measurement of electrical quantities may be done to measure electrical parameters of a system. Using transducers, physical properties such as temperature, pressure, flow, force, and many others can be converted into electrical signals, which can then be conveniently measured and recorded. High-precision laboratory measurements of electrical quantities are used in experiments to determine fundamental physical properties such as the charge of the electron or the speed of light, and in the definition of the units for electrical measurements, with precision in some cases on the order of a few parts per million. Less precise measurements are required every day in industrial practice. Electrical measurements are a branch of the science of metrology.', 'EEM'),
(67, 'Elements of Power System', 'An electric power system is a network of electrical components used to supply, transfer and use electric power. An example of an electric power system is the network that supplies a region''s homes and industry with power-for sizeable regions, this power system is known as the grid and can be broadly divided into the generators that supply the power, the transmission system that carries the power from the generating centres to the load centres and the distribution system that feeds the power to nearby homes and industries. Smaller power systems are also found in industry, hospitals, commercial buildings and homes. The majority of these systems rely upon three-phase AC power-the standard for large-scale power transmission and distribution across the modern world. Specialised power systems that do not always rely upon three-phase AC power are found in aircraft, electric rail systems, ocean liners and automobiles.', 'EPS'),
(68, 'Analog and Digital Integrated Circuits', 'Integrated circuit design, or IC design, is a subset of electronics engineering, encompassing the particular logic and circuit design techniques required to design integrated circuits, or ICs. ICs consist of miniaturized electronic components built into an electrical network on a monolithic semiconductor substrate by photolithography.', 'ADIC'),
(69, 'Numerical Methods and Optimization Techniques', 'In mathematics, computer science and operations research, mathematical optimization (alternatively, optimization or mathematical programming) is the selection of a best element (with regard to some criteria) from some set of available alternatives.[1]\r\n\r\nIn the simplest case, an optimization problem consists of maximizing or minimizing a real function by systematically choosing input values from within an allowed set and computing the value of the function. The generalization of optimization theory and techniques to other formulations comprises a large area of applied mathematics. More generally, optimization includes finding "best available" values of some objective function given a defined domain (or a set of constraints), including a variety of different types of objective functions and different types of domains.', 'NMOT'),
(70, 'Protection and Switchgear Engineering', 'In an electric power system, switchgear is the combination of electrical disconnect switches, fuses or circuit breakers used to control, protect and isolate electrical equipment. Switchgear is used both to de-energize equipment to allow work to be done and to clear faults downstream. This type of equipment is directly linked to the reliability of the electricity supply.', 'PSE'),
(71, 'Electromagnetic Fields and Waves', 'An electromagnetic field (also EM field) is a physical field produced by electrically charged objects.[1] It affects the behavior of charged objects in the vicinity of the field. The electromagnetic field extends indefinitely throughout space and describes the electromagnetic interaction. It is one of the four fundamental forces of nature ', 'EFW'),
(72, 'Communication Engineering', 'Telecommunications engineering, or telecoms engineering, is an engineering discipline that brings together all electrical engineering disciplines including computer engineering with systems engineering to enhance telecommunication systems. The work ranges from basic circuit design to strategic mass developments. A telecommunication engineer is responsible for designing and overseeing the installation of telecommunications equipment and facilities, such as complex electronic switching systems, copper wire telephone facilities,fiber optics cabling,IP data systems,Terrestrial radio link systems for conventional communications and process information. Telecommunication engineering also overlaps heavily with broadcast engineering.', 'CE'),
(73, 'Power System Analysis', 'An electric power system is a network of electrical components used to supply, transfer and use electric power. An example of an electric power system is the network that supplies a region''s homes and industry with powerâ€”for sizeable regions, this power system is known as the grid and can be broadly divided into the generators that supply the power, the transmission system that carries the power from the generating centres to the load centres and the distribution system that feeds the power to nearby homes and industries.', 'PSA'),
(74, 'Electrical Machines - III', 'The apparatus that converts energy in three categories: generators which convert mechanical energy to electrical energy, motors which convert electrical energy to mechanical energy, and transformers which changes the voltage level of an alternating current.', 'EMC-III'),
(75, 'Utilisation of Electrical Energy', 'The apparatus that converts energy in three categories: generators which convert mechanical energy to electrical energy, motors which convert electrical energy to mechanical energy, and transformers which changes the voltage level of an alternating current.', 'UEE'),
(76, 'Control System-I', 'A control system is a device, or set of devices, that manages, commands, directs or regulates the behaviour of other devices or systems. Industrial control systems are used in industrial production for controlling equipment or machines.', 'CS-I'),
(77, 'Microcontroller and its Applications', 'A microcontroller (or MCU, short for microcontroller unit) is a small computer (SoC) on a single integrated circuit containing a processor core, memory, and programmable input/output peripherals. Program memory in the form of Ferroelectric RAM, NOR flash or OTP ROM is also often included on chip, as well as a typically small amount of RAM. Microcontrollers are designed for embedded applications, in contrast to the microprocessors used in personal computers or other general purpose applications consisting of various discrete chips.', 'MCA'),
(78, 'Power System Operation and Control', 'An electric power system is a network of electrical components used to supply, transfer and use electric power. An example of an electric power system is the network that supplies a regions homes and industry with powerâ€”for sizeable regions, this power system is known as the grid and can be broadly divided into the generators that supply the power, the transmission system that carries the power from the generating centres to the load centres and the distribution system that feeds the power to nearby homes and industries. Smaller power systems are also found in industry, hospitals, commercial buildings and homes. The majority of these systems rely upon three-phase AC powerâ€”the standard for large-scale power transmission and distribution across the modern world. Specialised power systems that do not always rely upon three-phase AC power are found in aircraft, electric rail systems, ocean liners and automobiles.', 'PSOC'),
(79, 'High Voltage DC Transmission', 'A high-voltage, direct current (HVDC) electric power transmission system  uses direct current for the bulk transmission of electrical power, in contrast with the more common alternating current (AC) systems. For long-distance transmission, HVDC systems may be less expensive and suffer lower electrical losses. For underwater power cables, HVDC avoids the heavy currents required to charge and discharge the cable capacitance each cycle. For shorter distances, the higher cost of DC conversion equipment compared to an AC system may still be justified, due to other benefits of direct current links.', 'HVDCT'),
(80, 'Electrical Machine Design', 'The academic study of electric machines is the universal study of electric motors and electric generators. By the classic definition, electric machine is synonymous with electric motor or electric generator, all of which are electromechanical energy converters: converting electricity to mechanical power (i.e., electric motor) or mechanical power to electricity (i.e., electric generator). The movement involved in the mechanical power can be rotating or linear.', 'EMD'),
(81, 'Control System-II', 'A control system is a device, or set of devices, that manages, commands, directs or regulates the behaviour of other devices or systems. Industrial control systems are used in industrial production for controlling equipment or machines.', 'CS-II'),
(83, 'Design, Management and Auditing of Electrical Systems', 'Electrical system design is the design of electrical systems. This can be as simple as a flashlight cell connected through two wires to a light bulb or as involved as the space shuttle. Electrical systems are groups of electrical components connected to carry out some operation. Often the systems are combined with other systems. They might be subsystems of larger systems and have subsystems of their own.', 'DMAES'),
(84, 'Drives and Control', 'Adjustable speed drive (ASD) or variable-speed drive (VSD) describes equipment used to control the speed of machinery. Many industrial processes such as assembly lines must operate at different speeds for different products. Where process conditions demand adjustment of flow from a pump or fan, varying the speed of the drive may save energy compared with other techniques for flow control.', 'DC'),
(85, 'Power System Planning and Reliability ', 'An electric power system is a network of electrical components used to supply, transfer and use electric power. An example of an electric power system is the network that supplies a regions homes and industry with powerâ€”for sizeable regions, this power system is known as the grid and can be broadly divided into the generators that supply the power, the transmission system that carries the power from the generating centres to the load centres and the distribution system that feeds the power to nearby homes and industries. Smaller power systems are also found in industry, hospitals, commercial buildings and homes. The majority of these systems rely upon three-phase AC powerâ€”the standard for large-scale power transmission and distribution across the modern world. Specialised power systems that do not always rely upon three-phase AC power are found in aircraft, electric rail systems, ocean liners and automobiles.', 'PSPR'),
(86, 'Business Communication and Ethics', 'Communication is the process by which individuals exchange information between other individuals or groups of people. Throughout the process, effective communicators try as clearly and accurately to convey their thoughts, intentions and objectives to their receiver.Communication is successful only when both the sender and the receiver understand the same information.In todays business environments, effective communication skills are necessary due to the highly informational and technological era.', 'BCE'),
(87, 'Applied Mathematics - I', 'Applied mathematics is a branch of mathematics that deals with mathematical methods that find use in science, engineering, business, computer science, and industry. Thus, applied mathematics is a combination of mathematical science and specialized knowledge.', 'AM-i'),
(88, 'Applied Physics - I', 'Physics', 'AP-1'),
(89, 'Applied Chemistry - I', 'Applied Chemistry - I', 'AC-I'),
(90, 'Engineering Mechanics', 'Engineering Mechanics', 'EM-I'),
(91, 'Basic Electrical & Electronics Engineering', 'Basic Electrical & Electronics Engineering', 'BEE'),
(92, 'Environmental studies', 'Environmental studies', 'EVS'),
(94, 'Applied Mathematics - II', 'Applied mathematics is a branch of mathematics that deals with mathematical methods that find use in science, engineering, business, computer science, and industry. Thus, applied mathematics is a combination of mathematical science and specialized knowledge.', 'AM-II'),
(95, 'Applied Physics - II', 'Applied Physics - II', 'AP-II'),
(96, 'Applied Chemistry - II', 'Applied Chemistry - II', 'AC-II'),
(98, 'Structured Programming Approach', 'Structured Programming Approach', 'SPA'),
(99, 'Communication Skills', 'Communication Skills', 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `subj_course_mapping`
--

CREATE TABLE IF NOT EXISTS `subj_course_mapping` (
  `Scm_id` int(11) NOT NULL,
  `Course_id` int(11) NOT NULL DEFAULT '0',
  `sem` int(11) NOT NULL DEFAULT '0',
  `Subj_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subj_course_mapping`
--

INSERT INTO `subj_course_mapping` (`Scm_id`, `Course_id`, `sem`, `Subj_id`) VALUES
(1, 1, 5, 1),
(2, 1, 5, 2),
(3, 1, 4, 3),
(4, 1, 4, 4),
(6, 1, 6, 18),
(8, 1, 3, 20),
(9, 1, 3, 21),
(10, 1, 3, 22),
(11, 1, 3, 23),
(12, 1, 3, 24),
(13, 1, 3, 25),
(14, 1, 4, 26),
(15, 1, 4, 28),
(16, 1, 4, 29),
(17, 1, 4, 30),
(18, 1, 4, 31),
(19, 1, 5, 32),
(20, 1, 5, 33),
(22, 1, 6, 35),
(23, 1, 6, 36),
(24, 1, 6, 37),
(25, 1, 6, 38),
(26, 1, 6, 39),
(27, 1, 6, 40),
(28, 1, 7, 41),
(29, 1, 7, 42),
(30, 1, 7, 43),
(31, 1, 7, 44),
(32, 1, 7, 45),
(33, 1, 7, 46),
(34, 1, 7, 47),
(35, 1, 7, 48),
(36, 1, 7, 49),
(37, 1, 7, 50),
(38, 1, 8, 51),
(39, 1, 8, 52),
(40, 1, 8, 53),
(41, 1, 8, 54),
(42, 1, 8, 55),
(43, 1, 8, 56),
(44, 1, 8, 57),
(45, 1, 8, 58),
(46, 1, 8, 59),
(47, 2, 4, 9),
(48, 2, 4, 10),
(49, 2, 5, 11),
(50, 2, 5, 12),
(51, 2, 3, 61),
(52, 2, 3, 62),
(53, 2, 3, 63),
(54, 2, 3, 64),
(55, 2, 4, 67),
(56, 2, 4, 68),
(57, 2, 4, 69),
(58, 2, 5, 70),
(59, 2, 5, 71),
(60, 2, 5, 72),
(69, 2, 3, 20),
(116, 0, 1, 87),
(117, 0, 1, 88),
(118, 0, 1, 89),
(119, 0, 1, 90),
(120, 0, 1, 91),
(121, 0, 1, 92),
(122, 0, 2, 94),
(123, 0, 2, 95),
(124, 0, 2, 96),
(125, 0, 2, 97),
(126, 0, 2, 98),
(127, 0, 2, 99),
(128, 2, 6, 73),
(129, 2, 6, 74),
(130, 2, 6, 75),
(131, 2, 6, 76),
(132, 2, 6, 77),
(133, 0, 0, 0),
(134, 2, 7, 78),
(135, 2, 7, 79),
(136, 2, 7, 80),
(137, 2, 7, 81),
(138, 0, 0, 0),
(139, 2, 8, 83),
(140, 2, 8, 84),
(141, 2, 8, 85),
(143, 1, 5, 86),
(144, 2, 5, 86);

-- --------------------------------------------------------

--
-- Table structure for table `toppers`
--

CREATE TABLE IF NOT EXISTS `toppers` (
  `Topper_id` int(11) NOT NULL,
  `Subj_id` int(11) NOT NULL,
  `position` int(1) NOT NULL,
  `L_id` int(11) NOT NULL,
  `percentage` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toppers`
--

INSERT INTO `toppers` (`Topper_id`, `Subj_id`, `position`, `L_id`, `percentage`) VALUES
(10, 1, 1, 3, 85),
(12, 1, 2, 4, 75);

-- --------------------------------------------------------

--
-- Table structure for table `universitypapers`
--

CREATE TABLE IF NOT EXISTS `universitypapers` (
  `uni_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` varchar(5) NOT NULL,
  `pname` varchar(10) NOT NULL,
  `Subj_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `universitypapers`
--

INSERT INTO `universitypapers` (`uni_id`, `year`, `month`, `pname`, `Subj_id`) VALUES
(1, 2012, 'dec', 'asdf', 1),
(2, 2013, 'may', 'asdf', 1),
(3, 2012, 'may', 'asdf', 1),
(4, 2013, 'dec', 'sadf', 1),
(5, 2011, 'may', 'asdf', 1),
(6, 2011, 'dec', 'asdf', 1),
(7, 2010, 'dec', 'asddf', 1),
(8, 2010, 'may', 'asdf', 2),
(9, 2009, 'may', 'asdf', 2),
(10, 2009, 'dec', 'asdf', 2),
(11, 2008, 'may', 'asdf', 2),
(12, 2008, 'dec', 'asdf', 2),
(13, 2007, 'may', 'asdf', 2),
(14, 2007, 'dec', 'asdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `uploaders`
--

CREATE TABLE IF NOT EXISTS `uploaders` (
  `Uploaders_id` int(11) NOT NULL,
  `Subj_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `L_id` int(11) NOT NULL,
  `rating` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploaders`
--

INSERT INTO `uploaders` (`Uploaders_id`, `Subj_id`, `position`, `L_id`, `rating`) VALUES
(1, 1, 1, 5, '4.6'),
(2, 2, 1, 9, '4.7'),
(3, 1, 2, 9, '4.3'),
(4, 2, 2, 5, '4.4'),
(5, 1, 3, 1, '5');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `U_id` int(11) NOT NULL,
  `typeName` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`U_id`, `typeName`) VALUES
(1, 'admin'),
(2, 'user'),
(4, 'other');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`Chp_id`);

--
-- Indexes for table `chaptersinpaper`
--
ALTER TABLE `chaptersinpaper`
  ADD PRIMARY KEY (`ChpPaper_id`);

--
-- Indexes for table `chp_subj_mapping`
--
ALTER TABLE `chp_subj_mapping`
  ADD PRIMARY KEY (`Csm_id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`College_id`);

--
-- Indexes for table `contactus(guest)`
--
ALTER TABLE `contactus(guest)`
  ADD PRIMARY KEY (`C_id`);

--
-- Indexes for table `contactus(user)`
--
ALTER TABLE `contactus(user)`
  ADD PRIMARY KEY (`C_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Course_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`F_id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`Interest_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`L_id`);

--
-- Indexes for table `mcq`
--
ALTER TABLE `mcq`
  ADD PRIMARY KEY (`Mcq_id`);

--
-- Indexes for table `mcqinpaper`
--
ALTER TABLE `mcqinpaper`
  ADD PRIMARY KEY (`Mp_id`);

--
-- Indexes for table `mcqsappeared`
--
ALTER TABLE `mcqsappeared`
  ADD PRIMARY KEY (`MA_id`);

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`Paper_id`);

--
-- Indexes for table `papersappeared`
--
ALTER TABLE `papersappeared`
  ADD PRIMARY KEY (`PprAppr_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`Score_id`);

--
-- Indexes for table `securityquestion`
--
ALTER TABLE `securityquestion`
  ADD PRIMARY KEY (`Security_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`S_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subj_id`);

--
-- Indexes for table `subj_course_mapping`
--
ALTER TABLE `subj_course_mapping`
  ADD PRIMARY KEY (`Scm_id`);

--
-- Indexes for table `toppers`
--
ALTER TABLE `toppers`
  ADD PRIMARY KEY (`Topper_id`);

--
-- Indexes for table `universitypapers`
--
ALTER TABLE `universitypapers`
  ADD PRIMARY KEY (`uni_id`);

--
-- Indexes for table `uploaders`
--
ALTER TABLE `uploaders`
  ADD PRIMARY KEY (`Uploaders_id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`U_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `Chp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=545;
--
-- AUTO_INCREMENT for table `chaptersinpaper`
--
ALTER TABLE `chaptersinpaper`
  MODIFY `ChpPaper_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `chp_subj_mapping`
--
ALTER TABLE `chp_subj_mapping`
  MODIFY `Csm_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `College_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contactus(guest)`
--
ALTER TABLE `contactus(guest)`
  MODIFY `C_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contactus(user)`
--
ALTER TABLE `contactus(user)`
  MODIFY `C_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `Course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `F_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `Interest_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `L_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `mcq`
--
ALTER TABLE `mcq`
  MODIFY `Mcq_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `mcqinpaper`
--
ALTER TABLE `mcqinpaper`
  MODIFY `Mp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=191;
--
-- AUTO_INCREMENT for table `mcqsappeared`
--
ALTER TABLE `mcqsappeared`
  MODIFY `MA_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `Paper_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `papersappeared`
--
ALTER TABLE `papersappeared`
  MODIFY `PprAppr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `Score_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `securityquestion`
--
ALTER TABLE `securityquestion`
  MODIFY `Security_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `S_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Subj_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `subj_course_mapping`
--
ALTER TABLE `subj_course_mapping`
  MODIFY `Scm_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT for table `toppers`
--
ALTER TABLE `toppers`
  MODIFY `Topper_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `universitypapers`
--
ALTER TABLE `universitypapers`
  MODIFY `uni_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `uploaders`
--
ALTER TABLE `uploaders`
  MODIFY `Uploaders_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `U_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

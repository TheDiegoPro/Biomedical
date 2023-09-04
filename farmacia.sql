-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2021 a las 22:43:34
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `farmacia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf16_spanish2_ci NOT NULL,
  `precio` decimal(50,0) NOT NULL,
  `descripcion` text COLLATE utf16_spanish2_ci NOT NULL,
  `imagen` varchar(50) COLLATE utf16_spanish2_ci NOT NULL,
  `categoria` varchar(50) COLLATE utf16_spanish2_ci NOT NULL,
  `cantidad` int(50) NOT NULL,
  `fecha_vencimiento` varchar(50) COLLATE utf16_spanish2_ci NOT NULL,
  `numero_productos` varchar(50) COLLATE utf16_spanish2_ci NOT NULL,
  `num_cajas_lote` varchar(50) COLLATE utf16_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `nombre`, `precio`, `descripcion`, `imagen`, `categoria`, `cantidad`, `fecha_vencimiento`, `numero_productos`, `num_cajas_lote`) VALUES
(1, 'Acetaminofén 500 mg', '100', 'Analgésico y antipirético. Inhibe la síntesis de prostaglandinas en el SNC y bloquea la generación del impulso doloroso a nivel periférico. Actúa sobre el centro hipotalámico regulador de la temperatura.', 'images/productos/1608599930_acetaminofen2.jpg', 'analgesicos', 40, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Veinte (20) Tabletas', '10'),
(2, 'Acetaminofén 650mg', '130', 'Analgésico y antipirético. Inhibe la síntesis de prostaglandinas en el SNC y bloquea la generación del impulso doloroso a nivel periférico. Actúa sobre el centro hipotalámico regulador de la temperatura.', 'images\\productos\\acetaminofen2.jpg', 'analgesicos', 25, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Veinte (20) Tabletas', '10'),
(3, 'Acetaminofén Jarabe 120mg/5ml', '50', 'Analgésico y antipirético. Inhibe la síntesis de prostaglandinas en el SNC y bloquea la generación del impulso doloroso a nivel periférico. Actúa sobre el centro hipotalámico regulador de la temperatura.', 'images\\productos\\acetaminofen3.jpg', 'analgesicos', 29, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Un (1) Frasco', '10'),
(4, 'Acetaminofén gotas 100mg/ml', '40', 'Analgésico y antipirético. Inhibe la síntesis de prostaglandinas en el SNC y bloquea la generación del impulso doloroso a nivel periférico. Actúa sobre el centro hipotalámico regulador de la temperatura.', 'images\\productos\\acetaminofen4.jpg', 'analgesicos', 24, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Un (1) Frasco', '10'),
(5, 'Acetaminofén supositorios 300mg', '80', 'Analgésico y antipirético. Inhibe la síntesis de prostaglandinas en el SNC y bloquea la generación del impulso doloroso a nivel periférico. Actúa sobre el centro hipotalámico regulador de la temperatura.', 'images\\productos\\acetaminofen5.jpg', 'analgesicos', 25, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Cien (100) Supositorios', '10'),
(6, 'Paracetamol 500mg', '80', 'Paracetamol pertenece al grupo de medicamentos llamados analgésicos y antipiréticos. Paracetamol está indicado para el tratamiento de los síntomas del dolor leve a moderado y la fiebre.', 'images\\productos\\paracetamol1.jpg', 'analgesicos', 35, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Diez (10) Tabletas', '10'),
(7, 'Paracetamol gotas 100mg/ml', '60', 'Paracetamol pertenece al grupo de medicamentos llamados analgésicos y antipiréticos. Paracetamol está indicado para el tratamiento de los síntomas del dolor leve a moderado y la fiebre.', 'images\\productos\\paracetamol2.png', 'analgesicos', 30, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Un (1) Frasco', '10'),
(8, 'Paracetamol supositorios 300 MG', '90', 'Paracetamol pertenece al grupo de medicamentos llamados analgésicos y antipiréticos. Paracetamol está indicado para el tratamiento de los síntomas del dolor leve a moderado y la fiebre.', 'images\\productos\\paracetamol3.jpg', 'analgesicos', 29, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Cinco (5) Supositorios', '10'),
(9, 'Ibuprofeno 200 mg', '60', 'comprimidos está indicado en el tratamiento sintomático del dolor leve o moderado y de la fiebre.', 'images\\productos\\antiinflamatorio1.jpg', 'antiinflamatorios', 44, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Veinte (20) Tabletas', '10'),
(10, 'Ibuprofeno 400 mg', '80', 'El ibuprofeno es eficaz para reducir el dolor y la fiebre. Este medicamento está indicado para el alivio sintomático de los dolores ocasionales leves o moderados, como dolores de cabeza, dentales, menstruales, musculares (contracturas) o de espalda (lumbago), así como de estados febriles.', 'images\\productos\\antiinflamatorio2.png', 'antiinflamatorios', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Cien (100) Tabletas', '10'),
(11, 'Ibuprofeno 600 mg', '100', 'El ibuprofeno es eficaz para reducir el dolor y la fiebre. Este medicamento está indicado para el alivio sintomático de los dolores ocasionales leves o moderados, como dolores de cabeza, dentales, menstruales, musculares (contracturas) o de espalda (lumbago), así como de estados febriles.', 'images\\productos\\antiinflamatorio3.jpg', 'antiinflamatorios', 45, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Cuarenta (40) Tabletas', '10'),
(12, 'Ibuprofeno jarabe 100mg/5ml', '60', 'El ibuprofeno es eficaz para reducir el dolor y la fiebre. Este medicamento está indicado para el alivio sintomático de los dolores ocasionales leves o moderados, como dolores de cabeza, dentales, menstruales, musculares (contracturas) o de espalda (lumbago), así como de estados febriles.', 'images\\productos\\antiinflamatorio4.jpg', 'antiinflamatorios', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Un (1) Frasco', '10'),
(13, 'Ibuprofeno suspension oral 20mg/ml', '50', 'El ibuprofeno es eficaz para reducir el dolor y la fiebre. Este medicamento está indicado para el alivio sintomático de los dolores ocasionales leves o moderados, como dolores de cabeza, dentales, menstruales, musculares (contracturas) o de espalda (lumbago), así como de estados febriles.', 'images\\productos\\antiinflamatorio5.jpg', 'antiinflamatorios', 34, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Un (1) Frasco', '10'),
(14, 'Ibuprofeno suspension oral 40mg/ml', '65', 'El ibuprofeno es eficaz para reducir el dolor y la fiebre. Este medicamento está indicado para el alivio sintomático de los dolores ocasionales leves o moderados, como dolores de cabeza, dentales, menstruales, musculares (contracturas) o de espalda (lumbago), así como de estados febriles.', 'images\\productos\\antiinflamatorio6.jpg', 'antiinflamatorios', 35, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Un (1) Frasco', '10'),
(15, 'Diclofenac potásico 50 mg', '60', 'Es un medicamento antiinflamatorio no esteroideo (AINE). Se utiliza para reducir la inflamación y para tratar el dolor. Este medicamento se utiliza para tratar la osteoartritis, artritis reumatoide, el dolor leve a moderado y períodos menstruales dolorosos.', 'images\\productos\\antiinflamatorio7.jpg', 'antiinflamatorios', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Cincuenta (50) Tabletas', '10'),
(16, 'Diclofenac Potásico 150mg', '80', 'Es un medicamento antiinflamatorio no esteroideo (AINE). Se utiliza para reducir la inflamación y para tratar el dolor. Este medicamento se utiliza para tratar la osteoartritis, artritis reumatoide, el dolor leve a moderado y períodos menstruales dolorosos.', 'images\\productos\\antiinflamatorio8.png', 'antiinflamatorios', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Diez (10) Tabletas', '10'),
(17, 'Diclofenac Sódico 50 mg', '45', 'es un antiinflamatorio que posee actividades analgésicas y antipiréticas y está indicado por vía oral e intramuscular para el tratamiento de enfermedades reumáticas agudas, artritis reumatoidea, espondilitis anquilosante, artrosis, lumbalgia, gota en fase aguda, inflamación.', 'images\\productos\\antiinflamatorio9.jpg', 'antiinflamatorios', 32, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Diez (10) Tabletas', '10'),
(18, 'Ketoprofeno 50 mg', '50', 'es un fármaco antiinflamatorio no esteroideo. Tiene una potente actividad analgésica. Sirve para el tratamiento de enfermedades reumáticas, traumatologías y procesos inflamatorios en general. En humanos puede administrarse vía oral (50 o 200 mg) o parenteral (100mg intramuscular y Endovenoso).', 'images\\productos\\antiinflamatorio10.jpg', 'antiinflamatorios', 35, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Veinte (20) Cápsulas', '10'),
(19, 'Ketoprofeno crema 25mg/g Gel', '30', 'es un fármaco antiinflamatorio no esteroideo. Tiene una potente actividad analgésica. Sirve para el tratamiento de enfermedades reumáticas, traumatologías y procesos inflamatorios en general. En humanos puede administrarse vía oral (50 o 200 mg) o parenteral (100mg intramuscular y Endovenoso).', 'images\\productos\\antiinflamatorio11.png', 'antiinflamatorios', 30, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Un (1) Pomo', '10'),
(20, 'Ketoprofeno ampolla 100mg/2ml', '45', 'es un fármaco antiinflamatorio no esteroideo. Tiene una potente actividad analgésica. Sirve para el tratamiento de enfermedades reumáticas, traumatologías y procesos inflamatorios en general. En humanos puede administrarse vía oral (50 o 200 mg) o parenteral (100mg intramuscular y Endovenoso).', 'images\\productos\\antiinflamatorio12.jpg', 'antiinflamatorios', 40, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Un (1) Frasco', '10'),
(21, 'Amoxicilina 500 mg', '100', 'La amoxicilina es un antibiótico de la familia de las penicilinas. Es bactericida, es decir, destruye a los microbios. Por tanto, se utiliza para tratar un gran número de infecciones producidas por gérmenes sensibles a este antibiótico.', 'images\\productos\\antibioticos1.jpg', 'antibioticos', 48, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Cincuenta(50) Cápsulas', '10'),
(22, 'Amoxicilina suspensión oral 250mg/5mg', '70', 'La amoxicilina es un antibiótico de la familia de las penicilinas. Es bactericida, es decir, destruye a los microbios. Por tanto, se utiliza para tratar un gran número de infecciones producidas por gérmenes sensibles a este antibiótico.', 'images\\productos\\antibioticos2.jpg', 'antibioticos', 44, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Un (1) Frasco', '10'),
(23, 'Amoxicilina + ácido clavulanico 875mg/125mg', '65', 'amoxicilina/ácido clavulánico cinfa es un antibiótico que elimina las bacterias que causan las infecciones. Contiene dos fármacos diferentes llamados amoxicilina y ácido clavulánico. La amoxicilina pertenece al grupo de medicamentos conocido como ¿penicilinas¿ que a veces puede perder su eficacia (se inactiva).', 'images\\productos\\antibioticos3.jpg', 'antibioticos', 45, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Veinte (20) Tabletas', '10'),
(24, 'Amoxicilina + ácido clavulanico suspension oral 60', '80', 'La amoxicilina es un antibiótico de la familia de las penicilinas. Es bactericida, es decir, destruye a los microbios. Por tanto, se utiliza para tratar un gran número de infecciones producidas por gérmenes sensibles a este antibiótico.', 'images/productos/antibioticos4.png', 'antibioticos', 30, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Un (1) Frasco', '10'),
(25, 'Levofloxacino 500mg', '70', 'El levofloxacino es un antibiótico del grupo de las quinolonas, más concretamente una fluorquinolona, es un enantiómero activo del ofloxacino con casi el doble de la potencia de la ofloxacina con o sin toxicidad.', 'images/productos/antibioticos5.jpg', 'antibioticos', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Diez (10) Tabletas', '10'),
(26, 'Levofloxacino 750mg', '95', 'El levofloxacino es un antibiótico del grupo de las quinolonas, más concretamente una fluorquinolona, es un enantiómero activo del ofloxacino con casi el doble de la potencia de la ofloxacina con o sin toxicidad.', 'images/productos/antibioticos6.png', 'antibioticos', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Siete (7) Tabletas', '10'),
(27, 'Levofloxacino ampolla 5mg/ml', '80', 'El levofloxacino es un antibiótico del grupo de las quinolonas, más concretamente una fluorquinolona, es un enantiómero activo del ofloxacino con casi el doble de la potencia de la ofloxacina con o sin toxicidad.', 'images/productos/antibioticos7.jpg', 'antibioticos', 39, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Una (1) Ampolla', '10'),
(28, 'Gentamicina ampolla 160mg/2ml', '70', 'Indicada en infecciones del tracto urinario, infecciones del tórax, bacteriemia, septicemia, infecciones severas neonatales y otras infecciones sistémicas producidas por gérmenes sensibles como infecciones del sistema nervioso central, gastrointestinales, piel, huesos, tejido subcutáneo, en quemados y endocarditis.', 'images/productos/antibioticos8.jpg', 'antibioticos', 40, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Una(1) Ampolla', '10'),
(29, 'Gentamicina ampolla 80mg/2ml', '60', 'Indicada en infecciones del tracto urinario, infecciones del tórax, bacteriemia, septicemia, infecciones severas neonatales y otras infecciones sistémicas producidas por gérmenes sensibles como infecciones del sistema nervioso central, gastrointestinales, piel, huesos, tejido subcutáneo, en quemados y endocarditis.', 'images/productos/antibioticos9.jpg', 'antibioticos', 37, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Diez (10) Ampolla', '10'),
(30, 'Sultamicilina 750mg', '100', 'Profármaco de ampicilina, bactericida que inhibe la biosíntesis de la pared bacteriana, y de sulbactam, inhibidor de ß-lactamasas de microorganismos penicilín-resistentes.', 'images\\productos\\antibioticos10.jpg', 'antibioticos', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Diez (10) Tabletas', '10'),
(31, 'Sultamicilina 375mg', '75', 'Profármaco de ampicilina, bactericida que inhibe la biosíntesis de la pared bacteriana, y de sulbactam, inhibidor de ß-lactamasas de microorganismos penicilín-resistentes.', 'images\\productos\\antibioticos11.jpg', 'antibioticos', 44, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Diez (10) Tabletas', '10'),
(32, 'Sultamicilina suspensión oral 250mg/5ml', '80', 'Profármaco de ampicilina, bactericida que inhibe la biosíntesis de la pared bacteriana, y de sulbactam, inhibidor de ß-lactamasas de microorganismos penicilín-resistentes.', 'images\\productos\\antibioticos12.jpg', 'antibioticos', 40, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Un (1) Frasco', '10'),
(33, 'ceftriazona ampolla 1g', '50', 'La inyección de ceftriaxona se usa para tratar algunas infecciones provocadas por bacterias como la gonorrea (una enfermedad de transmisión sexual), enfermedad pélvica inflamatoria (infección de los órganos reproductivos de la mujer que puede causar infertilidad), meningitis.', 'images\\productos\\antibioticos13.jpg', 'antibioticos', 30, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Una (1) Ampolla', '10'),
(34, 'Amikacina ampolla 500mg', '80', 'La inyección de amikacina se usa para tratar algunas infecciones graves que son provocadas por bacterias como la meningitis (infección de las membranas que rodean el cerebro y la columna vertebral) así como infecciones de la sangre, abdomen (área del estómago), pulmones, piel, huesos.', 'images\\productos\\antibioticos14.jpg', 'antibioticos', 30, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Una (1) Ampolla', '10'),
(35, 'Amikacina ampolla 100mg', '50', 'La inyección de amikacina se usa para tratar algunas infecciones graves que son provocadas por bacterias como la meningitis (infección de las membranas que rodean el cerebro y la columna vertebral) así como infecciones de la sangre, abdomen (área del estómago), pulmones, piel, huesos.', 'images\\productos\\antibioticos15.jpg', 'antibioticos', 29, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Una (1) Ampolla', '10'),
(36, 'Albendazol 200mg', '60', 'Carbamato benzoimidazólico antihelmínitico absorbible activo frente a larvas y formas adultas de nematodos y cestodos. Es de elección en tratamiento de neurocisticercosis e hidatidosis tisulares.', 'images\\productos\\antiparasitario1.jpg', 'antiparasitario', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Dos (2) Tabletas', '10'),
(37, 'Nitazoxanida 500mg', '90', 'Agente antiprotozoo y antihelmístico con actividad frente a distintos microorganismos, entre estos la Giardia lamblia y el Cryptosporidium parvum, y otros como la Fasciola hepática, Hymenolpsis nana, Entamoeba hystolitica, Tricomonas vaginalis, A. lumbricoides.', 'images\\productos\\antiparasitario2.jpg', 'antiparasitario', 30, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Diez (10) Tabletas', '10'),
(38, 'Nitazoxanida suspensión oral 100mg/5ml', '50', 'Agente antiprotozoo y antihelmístico con actividad frente a distintos microorganismos, entre estos la Giardia lamblia y el Cryptosporidium parvum, y otros como la Fasciola hepática, Hymenolpsis nana, Entamoeba hystolitica, Tricomonas vaginalis, A. lumbricoides.', 'images\\productos\\antiparasitario3.jpg', 'antiparasitario', 30, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Un (1) Frasco', '10'),
(39, 'Metronidazol 500mg', '80', 'Es un nitroimidazol con propiedades antibacterianas y antiprotozoarias, que se utiliza para tratar las infecciones producidas por Tricomonas vaginalis, así como las amebiasis y giardasis.', 'images\\productos\\antiparasitario4.png', 'antiparasitario', 35, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Cuarenta (40) Tabletas', '10'),
(40, 'Metronidazol ovulos 500mg', '70', 'Es un nitroimidazol con propiedades antibacterianas y antiprotozoarias, que se utiliza para tratar las infecciones producidas por Tricomonas vaginalis, así como las amebiasis y giardasis.', 'images\\productos\\antiparasitario5.jpg', 'antiparasitario', 30, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Diez (10) Óvulos', '10'),
(41, 'Metronidazol suspensión oral 250mg/5ml', '60', 'Es un nitroimidazol con propiedades antibacterianas y antiprotozoarias, que se utiliza para tratar las infecciones producidas por Tricomonas vaginalis, así como las amebiasis y giardasis.', 'images\\productos\\antiparasitario6.jpg', 'antiparasitario', 25, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Un (1) Frasco', '10'),
(42, 'Aciclovir 200 mg', '40', 'Este medicamento está indicado en el tratamiento de: infecciones de la piel y mucosas producidas por el virus del herpes simple en pacientes inmunodeprimidos (sistema inmunológico disminuido) y su prevención, herpes genital (siendo eficaz en el primer período de herpes genital)', 'images\\productos\\antiviral1.jpg', 'antiviral', 29, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Veinticuatro (24) Tabletas', '10'),
(43, 'Aciclovir 400mg', '60', 'Este medicamento está indicado en el tratamiento de: infecciones de la piel y mucosas producidas por el virus del herpes simple en pacientes inmunodeprimidos (sistema inmunológico disminuido) y su prevención, herpes genital (siendo eficaz en el primer período de herpes genital)', 'images\\productos\\antiviral2.jpg', 'antiviral', 29, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Veinte (20) Tabletas', '10'),
(44, 'Aciclovir 800mg', '80', 'Este medicamento está indicado en el tratamiento de: infecciones de la piel y mucosas producidas por el virus del herpes simple en pacientes inmunodeprimidos (sistema inmunológico disminuido) y su prevención, herpes genital (siendo eficaz en el primer período de herpes genital)', 'images\\productos\\antiviral3.jpg', 'antiviral', 30, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Veinte (20) Comprimidos', '10'),
(45, 'Aciclovir crema 5%', '50', 'Este medicamento está indicado en el tratamiento de: infecciones de la piel y mucosas producidas por el virus del herpes simple en pacientes inmunodeprimidos (sistema inmunológico disminuido) y su prevención, herpes genital (siendo eficaz en el primer período de herpes genital)', 'images\\productos\\antiviral4.jpg', 'antiviral', 30, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Un (1) Pomo', '10'),
(46, 'Aciclovir Uguento oftalmico 3%', '40', 'Este medicamento está indicado en el tratamiento de: infecciones de la piel y mucosas producidas por el virus del herpes simple en pacientes inmunodeprimidos (sistema inmunológico disminuido) y su prevención, herpes genital (siendo eficaz en el primer período de herpes genital)', 'images\\productos\\antiviral5.jpg', 'antiviral', 30, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Un (1) Uguento', '10'),
(47, 'Remdesivir ampolla 100mg', '60', 'La inyección de remdesivir se usa para tratar la enfermedad por coronavirus 2019 (infección COVID-19) causada por el virus SARS-CoV-2 en adultos y niños de 12 años o más que pesan al menos 88 libras (40 kg) hospitalizados.', 'images\\productos\\antiviral6.jpg', 'antiviral', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Una (1) Ampolla', '10'),
(48, 'Losartan potásico 50mg', '70', 'Medicamento que se usa para tratar la presión arterial alta. El losartán potásico bloquea la acción de las sustancias químicas que hacen contraer (hacer más estrechos) los vasos sanguíneos. Es un tipo de antagonista del receptor de la angiotensina II.', 'images\\productos\\antihipertensivo1.jpg', 'antihipertensivo', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Treinta (30) Comprimidos', '10'),
(49, 'Losartan potásico 100mg', '85', 'Medicamento que se usa para tratar la presión arterial alta. El losartán potásico bloquea la acción de las sustancias químicas que hacen contraer (hacer más estrechos) los vasos sanguíneos. Es un tipo de antagonista del receptor de la angiotensina II.', 'images\\productos\\antihipertensivo2.jpg', 'antihipertensivo', 49, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Sesenta (60) Comprimidos', '10'),
(50, 'Candesartan 8mg', '40', 'El principio activo es candesartán cilexetilo. Este pertenece a un grupo de medicamentos llamados antagonistas de los receptores de angiotensina II. Actúa haciendo que los vasos sanguíneos se relajen y dilaten. Esto facilita la disminución de la presión arterial.', 'images\\productos\\antihipertensivo3.jpg', 'antihipertensivo', 30, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Catorce (14) Tabletas', '10'),
(51, 'Candesartan 16mg', '50', 'El principio activo es candesartán cilexetilo. Este pertenece a un grupo de medicamentos llamados antagonistas de los receptores de angiotensina II. Actúa haciendo que los vasos sanguíneos se relajen y dilaten. Esto facilita la disminución de la presión arterial.', 'images\\productos\\antihipertensivo4.jpg', 'antihipertensivo', 35, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Catorce (14) Comprimidos', '10'),
(52, 'Candesartan 32mg', '60', 'El principio activo es candesartán cilexetilo. Este pertenece a un grupo de medicamentos llamados antagonistas de los receptores de angiotensina II. Actúa haciendo que los vasos sanguíneos se relajen y dilaten. Esto facilita la disminución de la presión arterial.', 'images\\productos\\antihipertensivo5.png', 'antihipertensivo', 25, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Cincuenta (50) Tabletas', '10'),
(53, 'Candesartan + Hidroclorotiazida 16mg/12,5mg', '55', '', 'images\\productos\\antihipertensivo6.jpg', 'antihipertensivo', 25, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Veintiocho (28) Comprimidos', '10'),
(54, 'Enalapril 20mg', '60', 'Enalapril (maleato de enalapril) es la sal maleato de enalapril, un derivado de dos aminoácidos, L- alanina y L-prolina. La enzima de conversión de angiotensina (ECA) es una peptidil dipeptidasa que cataliza la conversión de angiotensina I a la sustancia hipertensora angiotensina II.', 'images\\productos\\antihipertensivo7.jpg', 'antihipertensivo', 29, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Doscientos Cincuenta (250) Tabletas', '10'),
(55, 'Captopril 25mg', '50', 'captopril cinfa es un medicamento que pertenece al grupo de los llamados inhibidores de la enzima convertidora de la angiotensina (inhibidores de la ECA). Captopril produce una relajación de los vasos sanguíneos y reduce la presión arterial.', 'images\\productos\\antihipertensivo8.jpeg', 'antihipertensivo', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Treinte (30) Tabletas', '10'),
(56, 'Captopril 50mg', '60', 'captopril cinfa es un medicamento que pertenece al grupo de los llamados inhibidores de la enzima convertidora de la angiotensina (inhibidores de la ECA). Captopril produce una relajación de los vasos sanguíneos y reduce la presión arterial.', 'images\\productos\\antihipertensivo9.jpg', 'antihipertensivo', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Treinta (30) Tabletas', '10'),
(57, 'Desloratadina 5mg', '65', 'La desloratadina se usa en adultos y niños para aliviar los síntomas de fiebre del heno y alergia, incluyendo estornudos; secreción nasal; así como ojos rojos, picazón, lagrimeo en los ojos.', 'images\\productos\\antialergicos1.jpg', 'antialergicos', 99, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Diez (10) Tabletas', '10'),
(58, 'Desloratadina solución oral 0.5mg/ml', '55', 'La desloratadina se usa en adultos y niños para aliviar los síntomas de fiebre del heno y alergia, incluyendo estornudos; secreción nasal; así como ojos rojos, picazón, lagrimeo en los ojos.', 'images\\productos\\antialergicos2.jpg', 'antialergicos', 99, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Un (1) Frasco', '10'),
(59, 'Fexofenadina 60mg', '65', 'La fexofenadina se usa para aliviar los síntomas de la rinitis alérgica estacional (fiebre del heno), incluyendo secresión nasal; estornudos; enrojecimiento, picazón u ojos acuosos; o picazón de la nariz, la garganta, o el paladar en adultos y niños de 2 años de edad y mayores.', 'images\\productos\\antialergicos3.jpg', 'antialergicos', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Diez (10) Comprimidos', '10'),
(60, 'Fexofenadina jarabe 60mg', '80', 'La fexofenadina se usa para aliviar los síntomas de la rinitis alérgica estacional (fiebre del heno), incluyendo secresión nasal; estornudos; enrojecimiento, picazón u ojos acuosos; o picazón de la nariz, la garganta, o el paladar en adultos y niños de 2 años de edad y mayores.', 'images\\productos\\antialergicos4.png', 'antialergicos', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Un (1) Frasco', '10'),
(61, 'Fexofenadina + pseudoefedrina 120mg - 60mg', '75', 'La fexofenadina se usa para aliviar los síntomas de la rinitis alérgica estacional (fiebre del heno), incluyendo secresión nasal; estornudos; enrojecimiento, picazón u ojos acuosos; o picazón de la nariz, la garganta, o el paladar en adultos y niños de 2 años de edad y mayores.', 'images\\productos\\antialergicos5.jpg', 'antialergicos', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Una (1) Unidad', '10'),
(62, 'fexofenadina + pseudoefedrina suspension oral 30mg', '60', 'La fexofenadina se usa para aliviar los síntomas de la rinitis alérgica estacional (fiebre del heno), incluyendo secresión nasal; estornudos; enrojecimiento, picazón u ojos acuosos; o picazón de la nariz, la garganta, o el paladar en adultos y niños de 2 años de edad y mayores.', 'images\\productos\\antialergicos6.jpg', 'antialergicos', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Un (1) Frasco', '10'),
(63, 'Hidroclorotiazida 12,5mg', '80', 'Los diuréticos aumentan la cantidad de orina producida por los riñones y a veces llamados comprimidos de agua.', 'images\\productos\\diureticos1.png', 'diureticos', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Treinta (30) Tabletas', '10'),
(64, 'Hidroclorotiazida 25mg', '95', 'Los diuréticos aumentan la cantidad de orina producida por los riñones y a veces llamados comprimidos de agua.', 'images\\productos\\diureticos2.jpg', 'diureticos', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Treinta (30) Tabletas', '10'),
(65, 'Furosemida 40mg', '65', 'La furosemida es un diurético fuerte (\'píldora de agua\') y puede ocasionar deshidratación y desequilibrio electrolítico.', 'images\\productos\\diureticos3.jpg', 'diureticos', 30, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Treinta (30) Comprimidos', '10'),
(66, 'Furosemida Ampolla 20mg/2ml', '80', 'La furosemida es un diurético fuerte (\'píldora de agua\') y puede ocasionar deshidratación y desequilibrio electrolítico.', 'images\\productos\\diureticos4.jpg', 'diureticos', 40, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Una (1) Ampolla', '10'),
(67, 'Espironolactona 25mg', '60', 'Espironolactona Alter se utiliza para reducir la tensión arterial elevada (hipertensión), la hinchazón por acumulación de líquidos (edemas) que causan ciertas enfermedades del riñón, hígado o del corazón y en el tratamiento de la insuficiencia cardiaca en combinación con otros medicamentos utilizados.', 'images\\productos\\diureticos5.jpg', 'diureticos', 30, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Veinte (20) Tabletas', '10'),
(68, 'Espironolactona 100mg', '65', 'Espironolactona Alter se utiliza para reducir la tensión arterial elevada (hipertensión), la hinchazón por acumulación de líquidos (edemas) que causan ciertas enfermedades del riñón, hígado o del corazón y en el tratamiento de la insuficiencia cardiaca en combinación con otros medicamentos utilizados.', 'images\\productos\\diureticos6.jpg', 'diureticos', 40, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Diez (10) Tabletas', '10'),
(69, 'Omeprazol 20mg', '85', 'El omeprazol con receta médica se utiliza solo o con otros medicamentos para tratar los síntomas de enfermedad por reflujo gastroesofágico (GERDuna condición en la que el flujo en dirección opuesta del ácido del estómago causa acidez y posibles lesiones al esófago (el tubo entre la garganta y el estómago).', 'images\\productos\\protector1.jpg', 'protector_gastrico', 47, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Veinte (20) Tabletas', '10'),
(70, 'Esomeprazol 20mg', '60', 'un inhibidor selectivo de la bomba de protones en la célula parietal. Actua en el médio ácido donde inhibe la bomba de protones e inhibe la secreción ácida basal y la estimulada. USO CLÍNICO: Tratamiento de la enfermedad por reflujo gastroesofágico a partir del primer año de vida (A).', 'images\\productos\\protector2.jpg', 'protector_gastrico', 30, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Veinticinco (25) Tabletas', '10'),
(71, 'Esomeprazol 40 mg', '50', 'un inhibidor selectivo de la bomba de protones en la célula parietal. Actua en el médio ácido donde inhibe la bomba de protones e inhibe la secreción ácida basal y la estimulada. USO CLÍNICO: Tratamiento de la enfermedad por reflujo gastroesofágico a partir del primer año de vida (A).', 'images\\productos\\protector3.jpg', 'protector_gastrico', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Catorce (14) Tabletas', '10'),
(72, 'Ranitidina 150mg', '80', 'La ranitidina se usa para tratar úlceras; reflujo gastroesofágico, una condición en la que el reflujo del ácido del estómago provoca pirosis (calor estomacal) y lesiones en el tubo alimenticio (esófago); y en aquellas condiciones en las que el estómago produce demasiado ácido, como el síndrome de Zollinger-Ellison.', 'images\\productos\\protector4.jpg', 'protector_gastrico', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Veintiocho (28) Comprimidos', '10'),
(73, 'Ranitidina 300mg', '85', 'La ranitidina se usa para tratar úlceras; reflujo gastroesofágico, una condición en la que el reflujo del ácido del estómago provoca pirosis (calor estomacal) y lesiones en el tubo alimenticio (esófago); y en aquellas condiciones en las que el estómago produce demasiado ácido, como el síndrome de Zollinger-Ellison.', 'images\\productos\\protector5.jpg', 'protector_gastrico', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Veintiocho (28) Comprimidos', '10'),
(74, 'Ranitidina ampolla 50mg/2ml', '60', 'La ranitidina se usa para tratar úlceras; reflujo gastroesofágico, una condición en la que el reflujo del ácido del estómago provoca pirosis (calor estomacal) y lesiones en el tubo alimenticio (esófago); y en aquellas condiciones en las que el estómago produce demasiado ácido, como el síndrome de Zollinger-Ellison.', 'images\\productos\\protector6.jpg', 'protector_gastrico', 30, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Una (1) Ampolla', '10'),
(75, 'Complejo B ampolla', '50', '', 'images\\productos\\vitaminas1.jpg', 'vitaminas', 49, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Una (1) Ampolla', '10'),
(76, 'Complejo B capsulas blandas', '50', '', 'images\\productos\\vitaminas2.jpg', 'vitaminas', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Treinta (30) Cápsulas', '10'),
(77, 'Vitamina c Tabletas masticables 500mg', '45', '', 'images\\productos\\vitaminas3.jpg', 'vitaminas', 49, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Cien (100) Tabletas', '10'),
(78, 'Vitamina C jarabe 100mg/ml', '60', '', 'images\\productos\\vitaminas4.png', 'vitaminas', 50, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Un (1) Frasco', '10'),
(79, 'Ácido folico 5mg', '50', '', 'images\\productos\\vitaminas5.jpg', 'vitaminas', 110, 'ELABORACIÓN: 12/20  -  VENCIMIENTO 12/25', 'Treinta (30) Comprimidos', '10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rif` int(15) DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Tipo_usuario` int(11) DEFAULT NULL,
  `activacion` int(10) DEFAULT NULL,
  `token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token_password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_request` int(11) DEFAULT NULL,
  `fecha_Registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `rif`, `estado`, `telefono`, `postal`, `email`, `foto`, `password`, `direccion`, `Tipo_usuario`, `activacion`, `token`, `token_password`, `password_request`, `fecha_Registro`) VALUES
(1, '123', 123, 'Apure', '13333', '123', '134@gmail.com', 'images/1608672090_Lighthouse.jpg', '123', '12', 2, 1, '0c1ba4262e2db66203c5972ebf1df1db', '0', 0, '2021-01-08 04:06:12'),
(5, 'fafa', 888, 'Anzoátegui', 'dsadasd', '4321', 'asdad', 'images/1609202782_12DC74F8-51D5-4E8D-AF96-717536C6BA00.jpeg', 'loco10', 'asdasd', 1, 1, '36e7ba74bde7b473933479cee9a6d232', '0', 0, '2021-01-08 03:53:49'),
(10, '123', 123412412, 'Amazonas', ' 123 ', '123', 'josepedobear@gmail.com', '', '123', '123', 1, 0, '7913019da204c5bb3eae3b27759b6281', 'acb1c85365b7a666c4830cee9a0ac663', 1, '2020-12-28 15:29:57'),
(11, 'asdasd', 12345, 'Amazonas', ' 1234 ', '123213', '124443@gmail.com', '', '123', '123', 2, 0, '7cf7389298596fc483d33f842dbee47f', NULL, NULL, '2020-12-14 09:13:42'),
(12, '123', 123123213, 'Amazonas', ' 123', '123', '1234@gmail.com', '', '123', '123', 2, 0, '4919988d1ce1c7cf51d97021b04c93fa', NULL, NULL, '2020-12-14 09:34:32'),
(13, '1234', 1234214124, 'Amazonas', ' 123', '12321', '1234455@gmail.com', '', '123', '123', 2, 0, '37b7e1a4c2ec583e13b63bcc4461b4eb', NULL, NULL, '2020-12-14 09:43:03'),
(15, '123', 123444555, 'Amazonas', ' 123 ', '123', 'wsdasdasd@gmail.com', '', '123', '123', 19, NULL, '0', NULL, NULL, '2020-12-15 05:31:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ID` int(200) NOT NULL,
  `nombre` varchar(50) COLLATE utf16_spanish2_ci NOT NULL,
  `producto` varchar(900) COLLATE utf16_spanish2_ci NOT NULL,
  `ClaveTransaccion` varchar(100) COLLATE utf16_spanish2_ci NOT NULL,
  `no_venta` varchar(50) COLLATE utf16_spanish2_ci NOT NULL,
  `Fecha` datetime NOT NULL,
  `Total` decimal(60,2) NOT NULL,
  `status` varchar(50) COLLATE utf16_spanish2_ci NOT NULL,
  `referencia` varchar(50) COLLATE utf16_spanish2_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf16_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`ID`, `nombre`, `producto`, `ClaveTransaccion`, `no_venta`, `Fecha`, `Total`, `status`, `referencia`, `direccion`) VALUES
(1, 'fafa', 'Acetaminofén 650mg , Nro: 2 . ', '8ubhg5fa4ned0t0o07g6ta1c6g', '', '2020-12-11 15:26:29', '6.00', 'APROBADO', '', ''),
(2, 'fafa', 'Acetaminofén 650mg , Nro: 2 . ', '8ubhg5fa4ned0t0o07g6ta1c6g', '', '2020-12-11 15:53:34', '6.00', 'APROBADO', '', ''),
(3, 'fafa', 'Acetaminofén 650mg , Nro: 2 . ', '8ubhg5fa4ned0t0o07g6ta1c6g', '', '2020-12-11 15:57:09', '6.00', 'PENDIENTE', '', ''),
(4, 'fafa', 'Acetaminofén 650mg , Nro: 2 . ', '8ubhg5fa4ned0t0o07g6ta1c6g', '', '2020-12-11 16:01:32', '6.00', 'APROBADO', '', ''),
(5, 'fafa', 'Acetaminofén 650mg , Nro: 1 . ', '8ubhg5fa4ned0t0o07g6ta1c6g', '', '2020-12-11 17:05:01', '3.00', 'PENDIENTE', '', ''),
(6, 'fafa', 'Acetaminofén 500 mg , Nro: 3 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 13:25:25', '6.00', 'APROBADO', '', ''),
(7, 'fafa', 'Acetaminofén 500 mg , Nro: 3 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 13:26:50', '6.00', 'APROBADO', '', ''),
(8, 'fafa', 'Acetaminofén 500 mg , Nro: 3 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 13:30:07', '6.00', 'APROBADO', '', ''),
(9, 'fafa', 'Acetaminofén 500 mg , Nro: 3 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 13:34:41', '6.00', 'PENDIENTE', '', ''),
(10, 'fafa', 'Acetaminofén 500 mg , Nro: 3 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 13:35:44', '6.00', 'PENDIENTE', '', ''),
(11, 'fafa', 'Acetaminofén 500 mg , Nro: 3 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 13:36:17', '6.00', 'PENDIENTE', '', ''),
(12, 'fafa', 'Acetaminofén 500 mg , Nro: 3 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 13:36:33', '6.00', 'PENDIENTE', '', ''),
(13, 'fafa', 'Acetaminofén 500 mg , Nro: 3 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 13:37:04', '6.00', 'PENDIENTE', '', ''),
(14, 'fafa', 'Gentamicina ampolla 80mg/2ml , Nro: 1 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 13:37:58', '8.00', 'APROBADO', '', ''),
(15, 'fafa', 'Gentamicina ampolla 80mg/2ml , Nro: 1 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 13:38:20', '8.00', 'PENDIENTE', '', ''),
(16, 'fafa', 'Gentamicina ampolla 80mg/2ml , Nro: 1 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 13:38:40', '8.00', 'PENDIENTE', '', ''),
(17, 'fafa', 'Gentamicina ampolla 80mg/2ml , Nro: 1 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 13:39:01', '8.00', 'PENDIENTE', '', ''),
(18, 'fafa', 'Gentamicina ampolla 80mg/2ml , Nro: 1 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 13:46:08', '8.00', 'PENDIENTE', '', ''),
(19, 'fafa', 'Gentamicina ampolla 80mg/2ml , Nro: 1 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 13:47:13', '8.00', 'PENDIENTE', '', ''),
(20, 'fafa', 'Acetaminofén Jarabe 120mg/5ml , Nro: 1 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 13:47:45', '5.00', 'PENDIENTE', '', ''),
(21, 'fafa', 'Acetaminofén Jarabe 120mg/5ml , Nro: 1 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 13:52:51', '5.00', 'PENDIENTE', '', ''),
(22, 'fafa', 'Acetaminofén Jarabe 120mg/5ml , Nro: 1 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 13:53:21', '5.00', 'PENDIENTE', '', ''),
(23, 'fafa', 'Acetaminofén Jarabe 120mg/5ml , Nro: 1 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 14:10:05', '5.00', 'PENDIENTE', '', ''),
(24, 'fafa', 'Acetaminofén Jarabe 120mg/5ml , Nro: 1 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 14:10:28', '5.00', 'PENDIENTE', '', ''),
(25, 'fafa', 'Acetaminofén Jarabe 120mg/5ml , Nro: 1 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 14:12:18', '5.00', 'PENDIENTE', '', ''),
(26, 'fafa', 'Acetaminofén Jarabe 120mg/5ml , Nro: 1 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 14:12:33', '5.00', 'PENDIENTE', '', ''),
(27, 'fafa', 'Acetaminofén Jarabe 120mg/5ml , Nro: 1 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 14:13:24', '5.00', 'PENDIENTE', '', ''),
(28, 'fafa', 'Acetaminofén Jarabe 120mg/5ml , Nro: 1 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 14:13:45', '5.00', 'PENDIENTE', '', ''),
(29, 'fafa', 'Acetaminofén Jarabe 120mg/5ml , Nro: 1 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 14:18:17', '5.00', 'PENDIENTE', '', ''),
(30, 'fafa', 'Acetaminofén Jarabe 120mg/5ml , Nro: 1 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 14:18:31', '5.00', 'PENDIENTE', '', ''),
(31, 'fafa', 'Acetaminofén Jarabe 120mg/5ml , Nro: 1 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 14:35:20', '5.00', 'PENDIENTE', '', ''),
(32, 'fafa', 'Acetaminofén Jarabe 120mg/5ml , Nro: 1 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 15:02:48', '5.00', 'PENDIENTE', '', ''),
(33, 'fafa', 'Amoxicilina 500 mg , Nro: 1 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 15:07:00', '10.00', 'PENDIENTE', '1234', ''),
(34, 'fafa', 'Amoxicilina 500 mg , Nro: 1 . ', 's9e6pbiuumpf657cg8hippru7r', '', '2020-12-12 15:29:05', '10.00', 'PENDIENTE', '123', ''),
(35, 'fafa', 'Acetaminofén 500 mg , Nro: 1 . Acetaminofén 650mg ', '9968o01clf6m9b7pviomt6l5d1', '', '2020-12-14 03:23:38', '8.00', 'PENDIENTE', '', ''),
(36, 'fafa', 'Acetaminofén 500 mg , Nro: 1 . Acetaminofén 650mg ', '9968o01clf6m9b7pviomt6l5d1', '', '2020-12-14 03:26:27', '8.00', 'PENDIENTE', '', ''),
(37, 'fafa', 'Acetaminofén 500 mg , Nro: 1 . Acetaminofén 650mg ', '9968o01clf6m9b7pviomt6l5d1', '', '2020-12-14 03:27:20', '8.00', 'APROBADO', '', ''),
(38, 'fafa', 'Ibuprofeno 200 mg , Nro: 1 . ', '9968o01clf6m9b7pviomt6l5d1', '', '2020-12-14 03:32:11', '7.00', 'PENDIENTE', '1231241234', ''),
(39, 'fafa', 'Acetaminofén Jarabe 120mg/5ml , Cantidad: 1 . ', 'vgobvltrurgd29cavtqujo1i6t', '', '2020-12-15 09:55:18', '5.00', 'PENDIENTE', '123456798', ''),
(40, 'fafa', 'Paracetamol supositorios 300 MG , Cantidad: 1 . ', '2qj2e25722l7t7te4g44fjvt0a', '', '2020-12-16 01:14:18', '5.00', 'PENDIENTE', '', ''),
(41, 'fafa', 'Paracetamol supositorios 300 MG , Cantidad: 1 . ', '2qj2e25722l7t7te4g44fjvt0a', '', '2020-12-16 01:19:37', '5.00', 'PENDIENTE', '', ''),
(42, 'fafa', 'Paracetamol supositorios 300 MG , Cantidad: 1 . ', '2qj2e25722l7t7te4g44fjvt0a', '', '2020-12-16 01:25:24', '5.00', 'APROBADO', '', ''),
(43, 'fafa', 'Paracetamol supositorios 300 MG , Cantidad: 1 . ', '2qj2e25722l7t7te4g44fjvt0a', '', '2020-12-16 01:37:15', '5.00', 'PENDIENTE', '', ''),
(44, 'fafa', 'Paracetamol supositorios 300 MG , Cantidad: 1 . ', '2qj2e25722l7t7te4g44fjvt0a', '', '2020-12-16 03:23:34', '5.00', 'APROBADO', '', ''),
(45, 'fafa', 'Paracetamol supositorios 300 MG , Cantidad: 1 . ', '2qj2e25722l7t7te4g44fjvt0a', '', '2020-12-16 03:32:05', '5.00', 'PENDIENTE', '', ''),
(46, 'fafa', 'Paracetamol supositorios 300 MG , Cantidad: 1 . ', '2qj2e25722l7t7te4g44fjvt0a', '', '2020-12-16 03:32:28', '5.00', 'PENDIENTE', '', ''),
(47, 'fafa', 'Paracetamol supositorios 300 MG , Cantidad: 1 . ', '2qj2e25722l7t7te4g44fjvt0a', '', '2020-12-16 03:32:42', '5.00', 'PENDIENTE', '', ''),
(48, 'fafa', 'Paracetamol supositorios 300 MG , Cantidad: 1 . ', '2qj2e25722l7t7te4g44fjvt0a', '', '2020-12-16 03:33:48', '5.00', 'PENDIENTE', '', ''),
(49, 'fafa', 'Paracetamol supositorios 300 MG , Cantidad: 1 . ', '2qj2e25722l7t7te4g44fjvt0a', '', '2020-12-16 03:34:24', '5.00', 'PENDIENTE', '', ''),
(50, 'fafa', 'Paracetamol supositorios 300 MG , Cantidad: 1 . ', '2qj2e25722l7t7te4g44fjvt0a', '', '2020-12-16 03:34:37', '5.00', 'PENDIENTE', '', ''),
(51, 'fafa', 'Paracetamol supositorios 300 MG , Cantidad: 1 . ', '2qj2e25722l7t7te4g44fjvt0a', '', '2020-12-16 03:34:49', '5.00', 'PENDIENTE', '', ''),
(52, 'fafa', 'Ibuprofeno suspension oral 20mg/ml , Cantidad: 1 .', 'dalf1oqtfcmg36leas7bt401uc', '', '2020-12-19 05:57:16', '9.00', 'APROBADO', '', ''),
(53, 'fafa', 'Omeprazol 20mg , Cantidad: 3 . ', 'dalf1oqtfcmg36leas7bt401uc', '', '2020-12-19 06:30:45', '15.00', 'PENDIENTE', '999999999999999', ''),
(54, 'fafa', 'Omeprazol 20mg , Cantidad: 3 . Complejo B ampolla ', 'dalf1oqtfcmg36leas7bt401uc', '', '2020-12-19 06:34:08', '20.00', 'APROBADO', '', ''),
(55, 'fafa', 'Gentamicina ampolla 80mg/2ml , Cantidad: 3 . ', 'dalf1oqtfcmg36leas7bt401uc', '', '2020-12-19 06:35:51', '24.00', 'APROBADO', '', ''),
(56, 'fafa', 'Levofloxacino ampolla 5mg/ml , Cantidad: 1 . ', 'j24fmhgic13k17l1j1rf7sjr7s', '', '2020-12-20 12:33:15', '8.00', 'PENDIENTE', '', ''),
(57, 'fafa', 'Levofloxacino ampolla 5mg/ml , Cantidad: 1 . ', 'j24fmhgic13k17l1j1rf7sjr7s', '', '2020-12-20 12:33:44', '8.00', 'APROBADO', '', ''),
(58, 'fafa', 'Diclofenac Sódico 50 mg , Cantidad: 1 . ', 'j24fmhgic13k17l1j1rf7sjr7s', '', '2020-12-20 13:51:04', '8.00', 'PENDIENTE', '', ''),
(59, 'fafa', 'Diclofenac Sódico 50 mg , Cantidad: 1 . ', 'j24fmhgic13k17l1j1rf7sjr7s', 'aebd8951bcb85f8ecfd7', '2020-12-20 13:55:31', '8.00', 'PENDIENTE', '', ''),
(60, 'fafa', 'Diclofenac Sódico 50 mg , Cantidad: 1 . ', 'j24fmhgic13k17l1j1rf7sjr7s', '9f62a9222246f615f283', '2020-12-20 13:56:06', '8.00', 'APROBADO', '', 'SECTOR POMONA, BAJANDO POR LA MANO DE DIOS HASTA TAPON,DESPUES CRUSAI A LA DERECHA,DESPUES A LA IZQUIERDA, A QUE \"EL POPULAR CUCOX C.A\"'),
(61, 'fafa', 'Vitamina c Tabletas masticables 500mg ,Cantidad: 1', '2jdq1149s775gl1j3p0e357esm', '00830c1351ca045311f4', '2021-01-04 13:36:21', '45.00', 'PENDIENTE', '1234', 'asdasd'),
(62, 'fafa', 'Vitamina c Tabletas masticables 500mg ,Cantidad: 1', '2jdq1149s775gl1j3p0e357esm', '217d8320b71ad7ac5fa7', '2021-01-04 13:37:44', '105.00', 'APROBADO', '', 'asdasd'),
(63, 'fafa', 'Metronidazol 500mg ,Cantidad: 1.', '2jdq1149s775gl1j3p0e357esm', '02277cf2cb083dad30f9', '2021-01-04 14:29:23', '80.00', 'PENDIENTE', '', 'asdasd'),
(64, 'fafa', 'Metronidazol 500mg ,Cantidad: 1.', '2jdq1149s775gl1j3p0e357esm', 'f1d8c4e8fde8df38169f', '2021-01-04 14:29:58', '80.00', 'PENDIENTE', '', 'asdasd'),
(65, 'fafa', 'Metronidazol 500mg ,Cantidad: 1.Amoxicilina suspen', '2jdq1149s775gl1j3p0e357esm', '340b44589211d850a729', '2021-01-04 14:29:58', '150.00', 'PENDIENTE', '', 'asdasd'),
(66, 'fafa', 'Aciclovir 200 mg ,Cantidad: 1. ', '2jdq1149s775gl1j3p0e357esm', '43b173332c01910e131e', '2021-01-04 21:07:06', '40.00', 'PENDIENTE', '', 'asdasd'),
(67, 'fafa', 'Aciclovir 200 mg ,Cantidad: 1. Aciclovir 400mg ,Ca', '2jdq1149s775gl1j3p0e357esm', 'a8a3e28bb7cfebcd2398', '2021-01-04 21:07:07', '100.00', 'PENDIENTE', '123456', 'asdasd'),
(68, 'fafa', 'Amoxicilina 500 mg ,Cantidad: 1. ', '2jdq1149s775gl1j3p0e357esm', '2607779d772f2c31fb60', '2021-01-04 21:11:06', '100.00', 'PENDIENTE', '', 'asdasd'),
(69, 'fafa', 'Amoxicilina 500 mg ,Cantidad: 1. Amoxicilina suspensión oral 250mg/5mg ,Cantidad: 1. ', '2jdq1149s775gl1j3p0e357esm', 'e4a1331d8f9eb9051c93', '2021-01-04 21:11:06', '170.00', 'PENDIENTE', '123451', 'asdasd'),
(70, 'fafa', 'Desloratadina 5mg ,Cantidad: 1. ', '2jdq1149s775gl1j3p0e357esm', 'f8b7eb07b9e665b6c183', '2021-01-04 21:47:07', '65.00', 'PENDIENTE', '', 'asdasd'),
(71, 'fafa', 'Desloratadina 5mg ,Cantidad: 1. Desloratadina solución oral 0.5mg/ml ,Cantidad: 1. ', '2jdq1149s775gl1j3p0e357esm', '03cb8bce8ed586d007f4', '2021-01-04 21:47:07', '120.00', 'APROBADO', '', 'asdasd'),
(72, 'fafa', 'Acetaminofén gotas 100mg/ml ,Cantidad: 1. ', '61esu1vsf9aifo7uv86g9mqhic', '490fb1dc3f7f4c19eeb7', '2021-01-07 23:27:13', '40.00', 'PENDIENTE', '12345', 'asdasd');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

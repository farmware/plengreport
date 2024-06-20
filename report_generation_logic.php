<?php
    ob_start();
    include("PDF/tcpdf.php");


    if(isset($_POST["generate_pdf_button"])){
        $date_of_report = $_POST['date_of_report'];
        $compiled_by = $_POST['compiled_by'];
        $project_title = $_POST['project_title'];
        $project_location = $_POST['project_location'];

        $wind_condition = $_POST['wind_condition'];
        $overcast_condition = $_POST['overcast_condition'];
        $sunny_condition = $_POST['sunny_condition'];
        $cloudy_condition = $_POST['cloudy_condition'];
        $rain_condition = $_POST['rain_condition'];
        $other_condition = $_POST['other_condition'];

        if($wind_condition === "on"){
          $wind_condition = "TRUE";
        }else{
          $wind_condition = "FALSE";
        }
        if($overcast_condition === "on"){
          $overcast_condition = "TRUE";
        }else{
          $overcast_condition = "FALSE";
        }
        if($sunny_condition === "on"){
          $sunny_condition = "TRUE";
        }else{
          $sunny_condition = "FALSE";
        }
        if($cloudy_condition === "on"){
          $cloudy_condition = "TRUE";
        }else{
          $cloudy_condition = "FALSE";
        }
        if($rain_condition === "on"){
          $rain_condition = "TRUE";
        }else{
          $rain_condition = "FALSE";
        }
        if($other_condition === "on"){
          $other_condition = "TRUE";
        }else{
          $other_condition = "FALSE";
        }
        

        $temperature = $_POST['temperature'];
        echo $temperature;

        $skilledlabor_data = array();
        if (isset($_POST['dyn_container_skilled']) && is_array($_POST['dyn_container_skilled'])) {
            foreach ($_POST['dyn_container_skilled'] as $index => $inputs) {
              $skilledlabor_data[] = $inputs;
            }
        }

        $unskilledlabor_data = array();
        if (isset($_POST['dyn_container_unskilled']) && is_array($_POST['dyn_container_unskilled'])) {
            foreach ($_POST['dyn_container_unskilled'] as $index => $inputs) {
              $unskilledlabor_data[] = $inputs;
            }
        }

        $equipment_data = array();
        if (isset($_POST['dyn_container_equipment']) && is_array($_POST['dyn_container_equipment'])) {
            foreach ($_POST['dyn_container_equipment'] as $index => $inputs) {
              $equipment_data[] = $inputs;
            }
        }

        $work_data = array();
        if (isset($_POST['dyn_container_work']) && is_array($_POST['dyn_container_work'])) {
            foreach ($_POST['dyn_container_work'] as $index => $inputs) {
              $work_data[] = $inputs;
            }
        }

        $material_data = array();
        if (isset($_POST['dyn_container_material']) && is_array($_POST['dyn_container_material'])) {
            foreach ($_POST['dyn_container_material'] as $index => $inputs) {
              $material_data[] = $inputs;
            }
        }

        $safety_inspection_report = $_POST['safety_inspection_report'];
        echo $safety_inspection_report;   

        $safety_recorded_incidents = $_POST['safety_recorded_incidents'];
        echo $safety_recorded_incidents;   

        $recommendations = $_POST['recommendations'];
        echo $recommendations;    

        $certification_name = $_POST['certification_name'];
        echo $certification_name;  


        /// PHOTOS DIRECTORIES
        $uploadDir = 'uploads/'; 
        $additionalImagesDir = 'uploads/additional_images/'; 
        

        /// PDF INITIALIZATION
        $pdf = new TCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetMargins(10, 10, 10); 
        $pdf->setPrintHeader(false);
        $pdf->AddPage();


        /// FONTS & COLOR
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('helvetica', '', 10);
        $pdf->SetFillColor(220, 220, 220);


        /// WIDTH AND PADDING
        $cellWidth_Labor = 100;
        $cellWidth_Equipment = 47;
        $cellWidth_Weather = 31.5;


        /// LOGOS
        if ((isset($_FILES['central_logo']['tmp_name']) && $_FILES['central_logo']['error'] === UPLOAD_ERR_OK)) {
          $central_logo = $uploadDir . basename($_FILES['central_logo']['name']);
          move_uploaded_file($_FILES['central_logo']['tmp_name'], $central_logo); 

          $pdf->Image($central_logo, 95, 5, 20, '', '', '', 'T', false, 400, '', false, false, 0, false, false, false);
          $pdf->Ln(25);
        }
        if ((isset($_FILES['logo1']['tmp_name']) && $_FILES['logo1']['error'] === UPLOAD_ERR_OK)) {
            $logo1 = $uploadDir . basename($_FILES['logo1']['name']);
            move_uploaded_file($_FILES['logo1']['tmp_name'], $logo1); 

            $pdf->Image($logo1, 10, 5, 20, '', '', '', 'T', false, 400, '', false, false, 0, false, false, false);
            $pdf->Ln(25);
        }
        if ((isset($_FILES['logo2']['tmp_name']) && $_FILES['logo2']['error'] === UPLOAD_ERR_OK)) {
            $logo2 = $uploadDir . basename($_FILES['logo2']['name']);
            move_uploaded_file($_FILES['logo2']['tmp_name'], $logo2);
    
            $pdf->Image($logo2, 180, 5, 20, '', '', '', 'T', false, 400, '', false, false, 0, false, false, false);
            $pdf->Ln(25);
        }


        /// SITE INFO TITLE
        $pdf->SetFont('helvetica', 'U', 13);
        $pdf->SetTextColor(0, 0, 0); 
        $pdf->setCellPadding(0);
        $pdf->Cell(0, 10, 'SITE REPORT', 0, 1, 'C');
        $pdf->SetFont('helvetica', '', 10); 
        $pdf->SetTextColor(0, 0, 0);
        $pdf->setCellPadding(3);
        $pdf->Ln(3); 


        /// SITE INFO SECTION
        $pdf->setCellPadding(0);
        $pdf->SetFont('helvetica', '', 8);
        $pdf->Cell(49, 10, "DATE", 1, 0, 'C', 1);
        $pdf->Cell(140, 10, $date_of_report, 1, 1, 'C', 0);

        $pdf->Cell(49, 10, "COMPILED BY", 1, 0, 'C', 1);
        $pdf->Cell(140, 10, $compiled_by, 1, 1,'C', 0);

        $pdf->Cell(49, 10, "PROJECT TITLE", 1, 0, 'C', 1);
        $pdf->Cell(140, 10, $project_title, 1, 1,'C', 0);

        $pdf->Cell(49, 10, "PROJECT LOCATION", 1, 0, 'C', 1);
        $pdf->Cell(140, 10, $project_location, 1, 1, 'C', 0);
        $pdf->setCellPadding(2);

        /// WEATHER CONDITION
        $pdf->Ln(3); 
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->SetTextColor(0, 0, 0); 
        $pdf->setCellPadding(0);
        $pdf->Cell(0, 10, 'Weather conditions', 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 10); 
        $pdf->SetTextColor(0, 0, 0);
        $pdf->setCellPadding(0);

        $pdf->SetFont('helvetica', '', 8);
        $pdf->Cell($cellWidth_Weather, 10, "WIND", 0, 0, 'C');
        $pdf->Cell($cellWidth_Weather, 10, "OVERCAST", 0, 0, 'C');
        $pdf->Cell($cellWidth_Weather, 10, "SUNNY", 0, 0, 'C');
        $pdf->Cell($cellWidth_Weather, 10, "CLOUDY", 0, 0, 'C');
        $pdf->Cell($cellWidth_Weather, 10, "RAIN", 0, 0, 'C');
        $pdf->Cell($cellWidth_Weather, 10, "OTHER", 0, 1, 'C');
        $pdf->SetFont('helvetica', '', 10);

        $pdf->SetFont('helvetica', '', 8);
        $pdf->Cell($cellWidth_Weather, 10, $wind_condition, 1, 0, 'C', 0);
        $pdf->Cell($cellWidth_Weather, 10, $overcast_condition, 1, 0, 'C', 0);
        $pdf->Cell($cellWidth_Weather, 10, $sunny_condition, 1, 0, 'C', 0);
        $pdf->Cell($cellWidth_Weather, 10, $cloudy_condition, 1, 0, 'C', 0);
        $pdf->Cell($cellWidth_Weather, 10, $rain_condition, 1, 0, 'C', 0);
        $pdf->Cell($cellWidth_Weather, 10, $other_condition, 1, 1, 'C', 0);
        $pdf->SetFont('helvetica', '', 10);

        /// TEMPERATURE
        $pdf->Ln(5); 
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->SetTextColor(0, 0, 0); 
        $pdf->setCellPadding(0);
        $pdf->Cell(0, 10, 'Temperature', 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 10); 
        $pdf->SetTextColor(0, 0, 0);
        $pdf->setCellPadding(0);
      
        $pdf->Ln(1); 
        $pdf->Cell(49, 10, $temperature, 1, 1, 'C', 0);

        /// SKILLED LABOR TABLE
        $pdf->Ln(5);
        
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->SetTextColor(0, 0, 0); 
        $pdf->setCellPadding(0);
        $pdf->Cell(0, 10, 'Skilled Labor', 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 10); 
        $pdf->SetTextColor(0, 0, 0);
        $pdf->setCellPadding(3);

        $pdf->Ln(3); 

        $pdf->SetFont('helvetica', '', 8);
        $pdf->Cell(45, 10, "NAME", 1, 0, 'C', 1);
        $pdf->Cell(45, 10, "POSITION", 1, 0, 'C', 1);
        $pdf->Cell($cellWidth_Labor, 10, "DESCRIPTION OF WORK", 1, 1, 'C', 1);
        $pdf->SetFont('helvetica', '', 10);

        $pageHeight = $pdf->getPageHeight();

        foreach ($skilledlabor_data as $row) {
            $calculatedHeight = $pdf->GetStringHeight($cellWidth_Labor, $row[2]);

            $spaceNeeded = $calculatedHeight * count($row);
            if ($pdf->GetY() + $spaceNeeded > $pageHeight) {
                $pdf->AddPage(); 
            }

            $xPos = $pdf->GetX();
            $yPos = $pdf->GetY();
            $pdf->MultiCell(45, $calculatedHeight, $row[0], 1,'C' , 0 , 1 , '' , '' , true , 0 , false , true);
            $pdf->SetXY($xPos + 45, $yPos);

            $xPos = $pdf->GetX();
            $yPos = $pdf->GetY();
            $pdf->MultiCell(45, $calculatedHeight, $row[1], 1 , 'C' , 0 , 1 , '' , '' , true , 0 , false , true);
            $pdf->SetXY($xPos + 45, $yPos);
          
            $xPos = $pdf->GetX();
            $yPos = $pdf->GetY();
            $pdf->MultiCell($cellWidth_Labor, $calculatedHeight, $row[2], 1 , 'L' , 0 , 1 , '' , '', true , 0 , false , true);
            $pdf->SetXY($xPos + $cellWidth_Labor, $yPos);

            $pdf->Ln();
        }


        
        /// UNSKILLED LABOR TABLE
        $pdf->Ln(5);

        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->SetTextColor(0, 0, 0); 
        $pdf->setCellPadding(0);
        $pdf->Cell(0, 10, 'Un-Skilled Labor', 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 10); 
        $pdf->SetTextColor(0, 0, 0);
        $pdf->setCellPadding(3);

        $pdf->Ln(3); 

        $pdf->SetFont('helvetica', '', 8);
        $pdf->Cell(45, 10, "NAME", 1, 0, 'C', 1);
        $pdf->Cell(45, 10, "POSITION", 1, 0, 'C', 1);
        $pdf->Cell($cellWidth_Labor, 10, "DESCRIPTION OF WORK", 1, 1, 'C', 1);
        $pdf->SetFont('helvetica', '', 10);

        $pageHeight = $pdf->getPageHeight();

        foreach ($unskilledlabor_data as $row) {
            $calculatedHeight = $pdf->GetStringHeight($cellWidth_Labor, $row[2]);

            $spaceNeeded = $calculatedHeight * count($row);
            if ($pdf->GetY() + $spaceNeeded > $pageHeight) {
                $pdf->AddPage(); 
            }

            $xPos = $pdf->GetX();
            $yPos = $pdf->GetY();
            $pdf->MultiCell(45, $calculatedHeight, $row[0], 1,'C' , 0 , 1 , '' , '' , true , 0 , false , true);
            $pdf->SetXY($xPos + 45, $yPos);

            $xPos = $pdf->GetX();
            $yPos = $pdf->GetY();
            $pdf->MultiCell(45, $calculatedHeight, $row[1], 1 , 'C' , 0 , 1 , '' , '' , true , 0 , false , true);
            $pdf->SetXY($xPos + 45, $yPos);
          
            $xPos = $pdf->GetX();
            $yPos = $pdf->GetY();
            $pdf->MultiCell($cellWidth_Labor, $calculatedHeight, $row[2], 1 , 'L' , 0 , 1 , '' , '', true , 0 , false , true);
            $pdf->SetXY($xPos + $cellWidth_Labor, $yPos);

            $pdf->Ln();
        }
  

        /// EQUIPMENT TABLE
        $pdf->Ln(5);

        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->SetTextColor(0, 0, 0); 
        $pdf->setCellPadding(0);
        $pdf->Cell(0, 10, 'Equipment Tracking', 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 10); 
        $pdf->SetTextColor(0, 0, 0);
        $pdf->setCellPadding(3);

        $pdf->Ln(3); 

        $pdf->SetFont('helvetica', '', 8);
        $pdf->Cell($cellWidth_Equipment, 10, "TYPE", 1, 0, 'C', 1);
        $pdf->Cell($cellWidth_Equipment, 10, "QUANTITY", 1, 0, 'C', 1);
        $pdf->Cell($cellWidth_Equipment, 10, "WORK ASSIGNMENT", 1, 0, 'C', 1);
        $pdf->Cell($cellWidth_Equipment, 10, "HOURS WORKED", 1, 1, 'C', 1);
        $pdf->SetFont('helvetica', '', 10);

        $pageHeight = $pdf->getPageHeight();

        foreach ($equipment_data as $row) {
            $calculatedHeight = $pdf->GetStringHeight($cellWidth_Equipment, $row[2]);

            $spaceNeeded = $calculatedHeight * count($row);
            if ($pdf->GetY() + $spaceNeeded > $pageHeight) {
                $pdf->AddPage(); 
            }

            $xPos = $pdf->GetX();
            $yPos = $pdf->GetY();
            $pdf->MultiCell($cellWidth_Equipment, $calculatedHeight, $row[0], 1,'C' , 0 , 1 , '' , '' , true , 0 , false , true);
            $pdf->SetXY($xPos + $cellWidth_Equipment, $yPos);

            $xPos = $pdf->GetX();
            $yPos = $pdf->GetY();
            $pdf->MultiCell($cellWidth_Equipment, $calculatedHeight, $row[1], 1 , 'C' , 0 , 1 , '' , '' , true , 0 , false , true);
            $pdf->SetXY($xPos + $cellWidth_Equipment, $yPos);
          
            $xPos = $pdf->GetX();
            $yPos = $pdf->GetY();
            $pdf->MultiCell($cellWidth_Equipment, $calculatedHeight, $row[2], 1 , 'L' , 0 , 1 , '' , '', true , 0 , false , true);
            $pdf->SetXY($xPos + $cellWidth_Equipment, $yPos);

            $xPos = $pdf->GetX();
            $yPos = $pdf->GetY();
            $pdf->MultiCell($cellWidth_Equipment, $calculatedHeight, $row[3], 1 , 'L' , 0 , 1 , '' , '', true , 0 , false , true);
            $pdf->SetXY($xPos + $cellWidth_Equipment, $yPos);

            $pdf->Ln();
        }


        /// WORKS TABLE
        $pdf->Ln(5);

        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->SetTextColor(0, 0, 0); 
        $pdf->setCellPadding(0);
        $pdf->Cell(0, 10, 'Works on Site', 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 10); 
        $pdf->SetTextColor(0, 0, 0);
        $pdf->setCellPadding(3);

        $pdf->Ln(3); 

        $pdf->SetFont('helvetica', '', 8);
        $pdf->Cell($cellWidth_Equipment, 10, "WORKS DEFINITION", 1, 0, 'C', 1);
        $pdf->Cell($cellWidth_Equipment, 10, "ZONE/LOCATION", 1, 0, 'C', 1);
        $pdf->Cell($cellWidth_Equipment, 10, "STATUS", 1, 0, 'C', 1);
        $pdf->Cell($cellWidth_Equipment, 10, "%COMPLETION", 1, 1, 'C', 1);
        $pdf->SetFont('helvetica', '', 10);

        $pageHeight = $pdf->getPageHeight();

        foreach ($work_data as $row) {
            $calculatedHeight = $pdf->GetStringHeight($cellWidth_Equipment, $row[0]);

            $spaceNeeded = $calculatedHeight * count($row);
            if ($pdf->GetY() + $spaceNeeded > $pageHeight) {
                $pdf->AddPage(); 
            }

            $xPos = $pdf->GetX();
            $yPos = $pdf->GetY();
            $pdf->MultiCell($cellWidth_Equipment, $calculatedHeight, $row[0], 1,'C' , 0 , 1 , '' , '' , true , 0 , false , true);
            $pdf->SetXY($xPos + $cellWidth_Equipment, $yPos);

            $xPos = $pdf->GetX();
            $yPos = $pdf->GetY();
            $pdf->MultiCell($cellWidth_Equipment, $calculatedHeight, $row[1], 1 , 'C' , 0 , 1 , '' , '' , true , 0 , false , true);
            $pdf->SetXY($xPos + $cellWidth_Equipment, $yPos);
          
            $xPos = $pdf->GetX();
            $yPos = $pdf->GetY();
            $pdf->MultiCell($cellWidth_Equipment, $calculatedHeight, $row[2], 1 , 'L' , 0 , 1 , '' , '', true , 0 , false , true);
            $pdf->SetXY($xPos + $cellWidth_Equipment, $yPos);

            $xPos = $pdf->GetX();
            $yPos = $pdf->GetY();
            $pdf->MultiCell($cellWidth_Equipment, $calculatedHeight, $row[3], 1 , 'L' , 0 , 1 , '' , '', true , 0 , false , true);
            $pdf->SetXY($xPos + $cellWidth_Equipment, $yPos);

            $pdf->Ln();
        }


        /// MATERIAL TABLE
        $pdf->Ln(5);

        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->SetTextColor(0, 0, 0); 
        $pdf->setCellPadding(0);
        $pdf->Cell(0, 10, 'Material Quantity', 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 10); 
        $pdf->SetTextColor(0, 0, 0);
        $pdf->setCellPadding(3);

        $pdf->Ln(3); 

        $pdf->SetFont('helvetica', '', 8);
        $pdf->Cell($cellWidth_Equipment, 10, "TYPE", 1, 0, 'C', 1);
        $pdf->Cell($cellWidth_Equipment, 10, "ZONE/LOCATION", 1, 0, 'C', 1);
        $pdf->Cell($cellWidth_Equipment, 10, "QUANTITY", 1, 0, 'C', 1);
        $pdf->Cell($cellWidth_Equipment, 10, "ORDER COMPLETION", 1, 1, 'C', 1);
        $pdf->SetFont('helvetica', '', 10);

        $pageHeight = $pdf->getPageHeight();

        foreach ($material_data as $row) {
            $calculatedHeight = $pdf->GetStringHeight($cellWidth_Equipment, $row[0]);

            $spaceNeeded = $calculatedHeight * count($row);
            if ($pdf->GetY() + $spaceNeeded > $pageHeight) {
                $pdf->AddPage(); 
            }

            $xPos = $pdf->GetX();
            $yPos = $pdf->GetY();
            $pdf->MultiCell($cellWidth_Equipment, $calculatedHeight, $row[0], 1,'C' , 0 , 1 , '' , '' , true , 0 , false , true);
            $pdf->SetXY($xPos + $cellWidth_Equipment, $yPos);

            $xPos = $pdf->GetX();
            $yPos = $pdf->GetY();
            $pdf->MultiCell($cellWidth_Equipment, $calculatedHeight, $row[1], 1 , 'C' , 0 , 1 , '' , '' , true , 0 , false , true);
            $pdf->SetXY($xPos + $cellWidth_Equipment, $yPos);
          
            $xPos = $pdf->GetX();
            $yPos = $pdf->GetY();
            $pdf->MultiCell($cellWidth_Equipment, $calculatedHeight, $row[2], 1 , 'L' , 0 , 1 , '' , '', true , 0 , false , true);
            $pdf->SetXY($xPos + $cellWidth_Equipment, $yPos);

            $xPos = $pdf->GetX();
            $yPos = $pdf->GetY();
            $pdf->MultiCell($cellWidth_Equipment, $calculatedHeight, $row[3], 1 , 'L' , 0 , 1 , '' , '', true , 0 , false , true);
            $pdf->SetXY($xPos + $cellWidth_Equipment, $yPos);

            $pdf->Ln();
        }


        $pdf->Ln(10);
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->SetTextColor(0, 0, 0); 
        $pdf->setCellPadding(0);
        $pdf->Cell(0, 10, 'Attachments', 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 10); 
        $pdf->SetTextColor(0, 0, 0);
        $pdf->setCellPadding(3);
        $pdf->Ln(5);

        
        // ATTACHMENTS
        $yPosition = $pdf->GetY();

        $imageWidth = 189;
        $imageHeight = 160;

        // Process the first uploaded image
        if (isset($_FILES['additional_images']['tmp_name'][0])) {
            $firstAdditionalImage = $additionalImagesDir . basename($_FILES['additional_images']['name'][0]);
            if (move_uploaded_file($_FILES['additional_images']['tmp_name'][0], $firstAdditionalImage)) {
                $pdf->Image($firstAdditionalImage, 10, $yPosition, $imageWidth, $imageHeight, '', '', '', false, 400, '', false, false, 0, false, false, false);
                $yPosition += $imageHeight + 10; 
            } else {
                echo "Failed to move the first additional image file.";
            }
        }
        // Process subsequent uploaded images
        for ($i = 1; $i < count($_FILES['additional_images']['tmp_name']); $i++) {
            $additionalImage = $additionalImagesDir . basename($_FILES['additional_images']['name'][$i]);
            if (move_uploaded_file($_FILES['additional_images']['tmp_name'][$i], $additionalImage)) {
                $pdf->Image($additionalImage, 10, $yPosition, $imageWidth, $imageHeight, '', '', '', false, 400, '', false, false, 0, false, false, false);
                $yPosition += $imageHeight + 10; 
            } else {
                echo "Failed to move additional image file " . ($i + 1) . ".";
            }
        }
        $pdf->SetXY(10, $yPosition);


        /// INSPECTION REPORT
        $pdf->Ln(10); 
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->SetTextColor(0, 0, 0); 
        $pdf->setCellPadding(0);
        $pdf->Cell(0, 10, 'Safety Inspection Report', 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 10); 
        $pdf->SetTextColor(0, 0, 0);
        

        $pdf->Ln(2); 
        $pdf->SetFont('helvetica', '', 11);
        $pdf->MultiCell(0, 5, $safety_inspection_report, 0, 'L');
        $pdf->SetFont('helvetica', 'B', 12);


        /// SITE INCIDENTS/ACCIDENTS
        $pdf->Ln(10); 
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->SetTextColor(0, 0, 0); 
        $pdf->setCellPadding(0);
        $pdf->Cell(0, 10, 'Recorded site incidents/accidents', 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 10); 
        $pdf->SetTextColor(0, 0, 0);

        $pdf->Ln(2); 
        $pdf->SetFont('helvetica', '', 11);
        $pdf->MultiCell(0, 5, $safety_recorded_incidents, 0, 'L');
        $pdf->SetFont('helvetica', 'B', 12);


        /// RECOMMENDATIONS
        $pdf->Ln(10); 
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->SetTextColor(0, 0, 0); 
        $pdf->setCellPadding(0);
        $pdf->Cell(0, 10, 'Recomendations', 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 10); 
        $pdf->SetTextColor(0, 0, 0);

        $pdf->Ln(2); 
        $pdf->SetFont('helvetica', '', 11);
        $pdf->MultiCell(0, 5, $recommendations, 0, 'L');

        /// CERTIFY
        $pdf->Ln(10);
        $pdf->SetFont('helvetica', '', 12);

        $certification_text = "I, ";
        $certification_text .= '<font color="#FF4500">' . $certification_name . '</font>';
        $certification_text .= " certify that I have compiled this site report and the information herein is accurate and up to date to the best of my knowledge.";
        
        $pdf->writeHTML($certification_text, true, false, true, false, '');
        $pdf->SetFont('helvetica', '', 12);
        $pdf->SetTextColor(0, 0, 0);

        /// DATE AND SIGNATURE
        $pdf->Ln(10);
        $pdf->setCellPadding(0);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(25, 10, "Signature:", 0, 0, 'L', 0);
        $pdf->Cell(40, 15, "", 1, 1, 'C', 0);
        $pdf->Ln(10);

        $pdf->Cell(25, 10, "Date:", 0, 0, 'L', 0);
        $pdf->Cell(40, 15, $date_of_report, 1, 1,'C', 0);
    
        ob_end_clean();
        $pdf->Output('Report.pdf', 'I'); 
        
    }

   

?>

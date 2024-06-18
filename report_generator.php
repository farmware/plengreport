<?php include('report_generation_logic.php') ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Site Inspection Report Generator</title>
        <link rel="shortcut icon" href="images/pleng.jpg">
        <link rel="stylesheet" href="report_generator15.css">
    </head>
    
    <body style="background-image: url('images/background.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">

        <div class="header">
            <h2>SITE REPORT GENERATOR</h2>
        </div>

        <form id="scrollTarget" action="report_generator.php" method="post" enctype="multipart/form-data">
            
            
            <div class="site_info">
                <div class="site_info_child">
                    <div class="site_info_child_title">
                        <p>DATE</p>
                    </div>
                    <div class="site_info_child_input">
                        <input id="site_info_input" type="date" name="date_of_report">
                    </div>
                </div>
                <div class="site_info_child">
                    <div class="site_info_child_title">
                        <p>COMPILED BY</p>
                    </div>
                    <div class="site_info_child_input">
                        <input id="site_info_input" type="text" name="compiled_by">
                    </div>
                </div>
                <div class="site_info_child">
                    <div class="site_info_child_title">
                        <p>PROJECT TITLE</p>
                    </div>
                    <div class="site_info_child_input">
                        <input id="site_info_input" type="text" name="project_title">
                    </div>
                </div>
                <div class="site_info_child">
                    <div class="site_info_child_title">
                        <p>PROJECT LOCATION</p>
                    </div>
                    <div class="site_info_child_input">
                        <input id="site_info_input" type="text" name="project_location">
                    </div>
                </div>
            </div>

            <hr>

            <div class="weather_container">
                <p class="weather_title">WEATHER CONDITIONS</p>
                <div class="weather_container_child">
                    <div class="weather_container_child_element">
                        <p>WINDY</p>
                        <input type="checkbox" id="checkbox4" name="wind_condition">
                    </div>
                    <div class="weather_container_child_element">
                        <p>OVERCAST</p>
                        <input type="checkbox" id="checkbox4" name="overcast_condition">
                    </div>
                    <div class="weather_container_child_element">
                        <p>SUNNY</p>
                        <input type="checkbox" id="checkbox4" name="sunny_condition">
                    </div>
                    <div class="weather_container_child_element">
                        <p>CLOUDY</p>
                        <input type="checkbox" id="checkbox4" name="cloudy_condition">
                    </div>
                    <div class="weather_container_child_element">
                        <p>RAIN</p>
                        <input type="checkbox" id="checkbox4" name="rain_condition">
                    </div>
                    <div class="weather_container_child_element">
                        <p>OTHER</p>
                        <input type="checkbox" id="checkbox4" name="other_condition">
                    </div>
                </div>
            </div>

            <div class="temperature_container">
                <p class="temperature_title">TEMPERATURE</p>
                <input type="text" name="temperature">
            </div>

            <hr>

            <div class="labor_container">
                <p class="labor_title">LABOR TRACKING</p>
                <p class="labor_sutitle">Skilled Labour</p>
                <div class="skilled_labor_container">
                    <div class="skilled_labor_container1">
                        <div class="skilled_labor_container1_child">
                            <p>NAME(OF TEAM/PERSON)</p>
                        </div>
                        <div class="skilled_labor_container1_child">
                            <p>POSITION</p>
                        </div>
                        <div class="skilled_labor_container1_child">
                            <p>DESCRIPTION OF WORK</p>
                        </div>
                    </div>
                    <div id="dynamic_container_skilled_labor">
                        <div class="skilled_labor_container2">
                            <div class="skilled_labor_container1_child">
                                <input type="text" name="dyn_container_skilled[0][]">
                            </div>
                            <div class="skilled_labor_container1_child">
                                <input type="text" name="dyn_container_skilled[0][]">
                            </div>
                            <div class="skilled_labor_container1_child">
                                <input type="text" name="dyn_container_skilled[0][]">
                            </div>
                            <button class="deleteBtn" style="display:none;">Delete</button>
                        </div>
                        <div class="skilled_labor_container2">
                            <div class="skilled_labor_container1_child">
                                <input type="text" name="dyn_container_skilled[1][]">
                            </div>
                            <div class="skilled_labor_container1_child">
                                <input type="text" name="dyn_container_skilled[1][]">
                            </div>
                            <div class="skilled_labor_container1_child">
                                <input type="text" name="dyn_container_skilled[1][]">
                            </div>
                            <button class="deleteBtn" style="display:none;">Delete</button>
                        </div>
                    </div>
                    <button type="button" class="new_container_buttons" id="addContainerBtn_Skilled">NEW CONTAINER</button>
                </div>
                <p class="labor_sutitle">Unskilled Labour</p>
                <div class="skilled_labor_container">
                    <div class="skilled_labor_container1">
                        <div class="skilled_labor_container1_child">
                            <p>NAME(OF TEAM/PERSON)</p>
                        </div>
                        <div class="skilled_labor_container1_child">
                            <p>POSITION</p>
                        </div>
                        <div class="skilled_labor_container1_child">
                            <p>DESCRIPTION OF WORK</p>
                        </div>
                    </div>
                    <div id="dynamic_container_unskilled_labor">
                        <div class="skilled_labor_container2">
                            <div class="skilled_labor_container1_child">
                                <input type="text" name="dyn_container_unskilled[0][]">
                            </div>
                            <div class="skilled_labor_container1_child">
                                <input type="text" name="dyn_container_unskilled[0][]">
                            </div>
                            <div class="skilled_labor_container1_child">
                                <input type="text" name="dyn_container_unskilled[0][]">
                            </div>
                        </div>
                        <div class="skilled_labor_container2">
                            <div class="skilled_labor_container1_child">
                                <input type="text" name="dyn_container_unskilled[1][]">
                            </div>
                            <div class="skilled_labor_container1_child">
                                <input type="text" name="dyn_container_unskilled[1][]">
                            </div>
                            <div class="skilled_labor_container1_child">
                                <input type="text" name="dyn_container_unskilled[1][]">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="new_container_buttons" id="addContainerBtn_Unskilled">NEW CONTAINER</button>
                </div>
            </div>


            <div class="equipment_container">
                <p class="equipment_title">EQUIPMENT TRACKING</p>
                <div class="equipment_container_child">
                    <div class="equipment_container1">
                        <div class="equipment_container1_child">
                            <p>TYPE</p>
                        </div>
                        <div class="equipment_container1_child">
                            <p>QUANTITY</p>
                        </div>
                        <div class="equipment_container1_child">
                            <p>WORK ASSIGNMENT</p>
                        </div>
                        <div class="equipment_container1_child">
                            <p>HOURS WORKED</p>
                        </div>
                    </div>
                    <div id="dynamic_container_equipment_tracking">
                        <div class="equipment_container2">
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_equipment[0][]">
                            </div>
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_equipment[0][]">
                            </div>
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_equipment[0][]">
                            </div>
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_equipment[0][]">
                            </div>
                        </div>
                        <div class="equipment_container2">
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_equipment[1][]">
                            </div>
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_equipment[1][]">
                            </div>
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_equipment[1][]">
                            </div>
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_equipment[1][]">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="new_container_buttons" id="addContainerBtn_Equipment">NEW CONTAINER</button>
                </div>
            </div>


            <div class="equipment_container">
                <p class="equipment_title">WORKS ON SITE</p>
                <div class="equipment_container">
                    <div class="equipment_container1">
                        <div class="equipment_container1_child">
                            <p>Works Definition</p>
                        </div>
                        <div class="equipment_container1_child">
                            <p>Zone/Location</p>
                        </div>
                        <div class="equipment_container1_child">
                            <p>Status</p>
                        </div>
                        <div class="equipment_container1_child">
                            <p>%Completion</p>
                        </div>
                    </div>
                    <div id="dynamic_container_works_on_site">
                        <div class="equipment_container2">
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_work[0][]">
                            </div>
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_work[0][]">
                            </div>
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_work[0][]">
                            </div>
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_work[0][]">
                            </div>
                        </div>
                        <div class="equipment_container2">
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_work[1][]">
                            </div>
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_work[1][]">
                            </div>
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_work[1][]">
                            </div>
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_work[1][]">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="new_container_buttons" id="addContainerBtn_Works">NEW CONTAINER</button>
                </div>
            </div>


            <div class="equipment_container">
                <p class="equipment_title">MATERIAL QUANTITY</p>
                <div class="equipment_container">
                    <div class="equipment_container1">
                        <div class="equipment_container1_child">
                            <p>Type</p>
                        </div>
                        <div class="equipment_container1_child">
                            <p>Zone/Location</p>
                        </div>
                        <div class="equipment_container1_child">
                            <p>Quantity</p>
                        </div>
                        <div class="equipment_container1_child">
                            <p>Order No</p>
                        </div>
                    </div>
                    <div id="dynamic_container_material_quantity">
                        <div class="equipment_container2">
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_material[0][]">
                            </div>
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_material[0][]">
                            </div>
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_material[0][]">
                            </div>
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_material[0][]">
                            </div>
                        </div>
                        <div class="equipment_container2">
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_material[1][]">
                            </div>
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_material[1][]">
                            </div>
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_material[1][]">
                            </div>
                            <div class="equipment_container1_child">
                                <input id="equipment_input" type="text" name="dyn_container_material[1][]">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="new_container_buttons" id="addContainerBtn_Material">NEW CONTAINER</button>
                </div>
            </div>


            <div class="safety_container">
                <p class="safety_title">SAFETY</p>
                <p class="safety_subtitle">Site inspection meeting/report;</p>
                <textarea id="message" name="safety_inspection_report" style="width: 120vh;height: 30vh; font-size: 2.5vh; padding: 2vh; font-family: 'Arial', sans-serif; line-height: 1.5; "></textarea>
                <p class="safety_subtitle">Recorded site incidents/accidents;</p>
                <textarea id="message" name="safety_recorded_incidents" style="width: 120vh;height: 30vh; font-size: 2.5vh; padding: 2vh; font-family: 'Arial', sans-serif; line-height: 1.5; "></textarea>
            </div>


            <div class="recommendations_container">
                <p class="recommendations_title">RECOMMENDATION/COMMENTS</p>
                <textarea id="message" name="recommendations" style="width: 120vh;height: 30vh; font-size: 2.5vh; padding: 2vh; font-family: 'Arial', sans-serif; line-height: 1.5; "></textarea>
            </div>


            <div class="declaration_container">
                <p>
                    I, <input type="text" id="certification_name" name="certification_name">, certify that I have compiled this site report and the information herein is accurate and up to date to the best of my knowledge.
                </p>
            </div>

            <div class="pdf_container">
                <label for="additional_images[]" style="margin-bottom: 5vh;color: black; font-size: 3vh; font-weight: bold">Attachments(Optional)</label>
                <input type="file" name="additional_images[]" accept="image/*" multiple><br><br>
                <label for="central_logo"  style="margin-bottom: 5vh;color: black; font-size: 3vh; font-weight: bold">Central Logo (Optional)</label>
                <input type="file" name="central_logo" accept="image/*"><br><br>
                <label for="logo1"  style="margin-bottom: 5vh;color: black; font-size: 3vh; font-weight: bold">Left Logo (Optional)</label>
                <input type="file" name="logo1" accept="image/*"><br><br>
                <label for="logo2"  style="margin-bottom: 5vh;color: black; font-size: 3vh; font-weight: bold">Right Logo (Optional)</label>
                <input type="file" name="logo2" accept="image/*"><br><br>
                <button type="submit" name="generate_pdf_button">GENERATE PDF</button>
            </div>
            
        </form>

        <div class="floating-icon" onclick="scrollByDistance()">
            <ion-icon name="chevron-down-circle-outline"></ion-icon>
        </div>


        <!-- ION ICONS -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <script>
            document.getElementById('addContainerBtn_Skilled').addEventListener('click', function() {
            const containers = document.querySelectorAll('.skilled_labor_container2');
            const newContainer = createNewSkilledContainer(containers.length);
            document.getElementById('dynamic_container_skilled_labor').appendChild(newContainer);
            });

            function createNewSkilledContainer(index) {
                const container = document.createElement('div');
                container.classList.add('skilled_labor_container2');

                for (let i = 0; i < 3; i++) {
                    const childDiv = document.createElement('div');
                    childDiv.classList.add('skilled_labor_container1_child');

                    const input = document.createElement('input');
                    input.setAttribute('type', 'text');
                    input.setAttribute('name', `dyn_container_skilled[${index}][]`);

                    childDiv.appendChild(input);
                    container.appendChild(childDiv);
                }

                const deleteBtn = document.createElement('button');
                deleteBtn.classList.add('deleteBtn');
                deleteBtn.textContent = 'Delete';
                container.appendChild(deleteBtn);

                deleteBtn.addEventListener('click', function() {
                    container.remove();
                });

                return container;
            }
        </script>

        <script>
            document.getElementById('addContainerBtn_Unskilled').addEventListener('click', function() {
            const containers = document.querySelectorAll('.skilled_labor_container2');
            const newContainer = createNewUnSkilledContainer(containers.length);
            document.getElementById('dynamic_container_unskilled_labor').appendChild(newContainer);
            });

            function createNewUnSkilledContainer(index) {
                const container = document.createElement('div');
                container.classList.add('skilled_labor_container2');

                for (let i = 0; i < 3; i++) {
                    const childDiv = document.createElement('div');
                    childDiv.classList.add('skilled_labor_container1_child');

                    const input = document.createElement('input');
                    input.setAttribute('type', 'text');
                    input.setAttribute('name', `dyn_container_unskilled[${index}][]`);

                    childDiv.appendChild(input);
                    container.appendChild(childDiv);
                }

                const deleteBtn = document.createElement('button');
                deleteBtn.classList.add('deleteBtn');
                deleteBtn.textContent = 'Delete';
                container.appendChild(deleteBtn);

                deleteBtn.addEventListener('click', function() {
                    container.remove();
                });

                return container;
            }
        </script>

        <script>
            document.getElementById('addContainerBtn_Equipment').addEventListener('click', function() {
            const containers = document.querySelectorAll('.equipment_container2');
            const newContainer = createNewEquipmentContainer(containers.length);
            document.getElementById('dynamic_container_equipment_tracking').appendChild(newContainer);
            });

            function createNewEquipmentContainer(index) {
                const container = document.createElement('div');
                container.classList.add('equipment_container2');

                for (let i = 0; i < 4; i++) {
                    const childDiv = document.createElement('div');
                    childDiv.classList.add('equipment_container1_child');

                    const input = document.createElement('input');
                    input.setAttribute('type', 'text');
                    input.setAttribute('id', 'equipment_input');
                    input.setAttribute('name', `dyn_container_equipment[${index}][]`);

                    childDiv.appendChild(input);
                    container.appendChild(childDiv);
                }

                const deleteBtn = document.createElement('button');
                deleteBtn.classList.add('deleteBtn');
                deleteBtn.textContent = 'Delete';
                container.appendChild(deleteBtn);

                deleteBtn.addEventListener('click', function() {
                    container.remove();
                });

                return container;
            }
        </script>

        <script>
            document.getElementById('addContainerBtn_Works').addEventListener('click', function() {
            const containers = document.querySelectorAll('.equipment_container2');
            const newContainer = createNewWorksContainer(containers.length);
            document.getElementById('dynamic_container_works_on_site').appendChild(newContainer);
            });

            function createNewWorksContainer(index) {
                const container = document.createElement('div');
                container.classList.add('equipment_container2');

                for (let i = 0; i < 4; i++) {
                    const childDiv = document.createElement('div');
                    childDiv.classList.add('equipment_container1_child');

                    const input = document.createElement('input');
                    input.setAttribute('type', 'text');
                    input.setAttribute('id', 'equipment_input');
                    input.setAttribute('name', `dyn_container_work[${index}][]`);

                    childDiv.appendChild(input);
                    container.appendChild(childDiv);
                }

                const deleteBtn = document.createElement('button');
                deleteBtn.classList.add('deleteBtn');
                deleteBtn.textContent = 'Delete';
                container.appendChild(deleteBtn);

                deleteBtn.addEventListener('click', function() {
                    container.remove();
                });

                return container;
            }
        </script>

        <script>
            document.getElementById('addContainerBtn_Material').addEventListener('click', function() {
            const containers = document.querySelectorAll('.equipment_container2');
            const newContainer = createNewWorksContainer(containers.length);
            document.getElementById('dynamic_container_material_quantity').appendChild(newContainer);
            });

            function createNewWorksContainer(index) {
                const container = document.createElement('div');
                container.classList.add('equipment_container2');

                for (let i = 0; i < 4; i++) {
                    const childDiv = document.createElement('div');
                    childDiv.classList.add('equipment_container1_child');

                    const input = document.createElement('input');
                    input.setAttribute('type', 'text');
                    input.setAttribute('id', 'equipment_input');
                    input.setAttribute('name', `dyn_container_material[${index}][]`);

                    childDiv.appendChild(input);
                    container.appendChild(childDiv);
                }

                const deleteBtn = document.createElement('button');
                deleteBtn.classList.add('deleteBtn');
                deleteBtn.textContent = 'Delete';
                container.appendChild(deleteBtn);

                deleteBtn.addEventListener('click', function() {
                    container.remove();
                });

                return container;
            }
        </script>

        <script>
           function scrollByDistance() {
             var scrollDistance = 100; 
             window.scrollBy(0, scrollDistance);
           }     
        </script>
                        
    </body>
</html>


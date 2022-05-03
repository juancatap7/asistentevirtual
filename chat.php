<?php                            
                                if(!empty($_POST)){
                                    $aKeyword = explode(" ", $_POST['PalabraClave']);
                                    $query ="SELECT * FROM cursos WHERE lenguaje like '%" . $aKeyword[0] . "%' OR descripcion like '%" . $aKeyword[0] . "%'";
                                    for($i = 1; $i < count($aKeyword); $i++) {
                                        if(!empty($aKeyword[$i])) {
                                            $query .= "OR descripcion like '%" . $aKeyword[$i] . "%'";
                                        }
                                    }
                                $result = $db->query($query);
                                echo "<b class='me'> ". $_POST['PalabraClave']."</b>";                     
                                if(mysqli_num_rows($result) > 0) {
                                    $row_count=0;
                                    echo "<br><table class='table alicia' border>";
                                    While($row = $result->fetch_assoc()) {   
                                        $row_count++;                         
                                        echo "<tr><td>".$row_count." </td><td>". $row['lenguaje'] . "</td><td>". $row['descripcion'] . "</td></tr>";
                                    }
                                    echo "</table>";
	                            }
                                else {
                                    echo "<b class='alicia'>Resultados encontrados: Ninguno</b>";
                                }
                                } 
                            ?>
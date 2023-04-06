<?php
    include_once("class.aluno.php");

    $aluno = new aluno("João", 123456789);
    $aluno->setMatricula(2023001);
    
    $aluno->printMe();
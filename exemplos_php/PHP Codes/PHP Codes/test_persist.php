<?php
  // require_once('../global.php');
  include_once('alunoTst.php');

   /* include("persist.php");
    include("container.php");
    $o_persist = new persist("teste.txt");
    $o_persist->persist();
    $o_persist->load();

    $o_persist2 = new persist("teste2.txt");
    $o_persist2->persist();
    $o_persist2->load();

    $o_containerPersist = new container("container.txt");
    $o_containerPersist->addObject($o_persist);
    $o_containerPersist->addObject($o_persist2);
    $o_containerPersist->persist();
    $o_containerPersist->load(); */  

   /*$aluno = new alunoTst();
   $aluno->nome = "Ramon3";
   $aluno->matricula = 891982;
   $aluno->save();
   echo $aluno;*/
   print_r( alunoTst::getRecords() );

   /*try{      
      $alunoJoao = alunoTst::getRecordsByField( "nome", "Ze" );   
      print_r( $alunoJoao);
   }
      catch (Exception $e) {
      echo $e->getMessage();
   }*/



    //$alunoJoao->nome = "João";
    //$alunoJoao->save();   
   
   /*include_once("alunoTst.php");
   print_r( alunoTst::getRecords() );*/

   /*include_once("container.php");
   $o_container = container::getInstance();
   print_r($o_container);
   $o_container->setFilename('novoNome.txt');
   print_r($o_container);
   $o_container2 = container::getInstance();
   print_r($o_container2);*/

   /*include_once("persist.php");
   $persist = new persist();*/

   //   $disciplina_POO = new discplina();
    //  echo $disciplina_POO;
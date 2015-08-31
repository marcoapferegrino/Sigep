<?php

$compileCmd  = "gcc testing/pruebaC.c -o  testing/prueba -std=c90 2>&1";
exec($compileCmd,$output);
dd($output);

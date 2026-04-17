<?php
switch ($page) {
    case 'backend':
        include 'backend.php';
        break;
    case 'calendario':
        include 'calendario.php';
        break;
    case 'arquivo':
        include 'arquivo.php';
        break;
    case 'padroes':
        include 'padroes.php';
        break;
    case 'editor':
        include 'editor.php';
        break;
}
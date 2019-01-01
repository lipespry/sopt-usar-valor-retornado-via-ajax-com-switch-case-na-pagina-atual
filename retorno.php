<?php 

if (isset($_POST['aaa'])) {
    echo $_POST['aaa'];
} else {
    echo "Não retornou nenhum valor com ajax.";
}

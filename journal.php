<?php
require __DIR__.'/header.php';
use App\CharacterLogRepository;

$charactersLog = null;

if (isset($_SESSION['id'])) {
    $characterLogRepository = new CharacterLogRepository($base);
    $charactersLog = $characterLogRepository->findAllForMe($_SESSION['id']);
}

echo $twig->render('journal.html.twig', ['charactersLog' => $charactersLog]);

?>
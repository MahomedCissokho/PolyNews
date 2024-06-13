<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ActuNet</title>
    <link rel="stylesheet" href="page.css">
</head>

<body>
    <div id="header">
        <ul id='list-item'></ul>
    </div>
    <div id="content"></div>
</body>

<?php

$mysqli = new mysqli("localhost", "root", "passer", "mglsi_news");

if ($mysqli->connect_errno) {
    echo "Connexion to mglsi_news failed " . $mysqli->error;
    exit();
}


$dataArticles = [[]];
$dataCategories = [[]];

$allCategories = 'SELECT id, libelle FROM CATEGORIE';
$categoriesArray = $mysqli->query($allCategories);


$allArticles = 'SELECT id, titre, contenu, categorie FROM ARTICLE';
$articlesArray = $mysqli->query($allArticles);

$i = 0;
while ($article = $articlesArray->fetch_row()) {
    $dataArticles[$i]['id'] = $article[0];
    $dataArticles[$i]['titre'] = $article[1];
    $dataArticles[$i]['contenu'] = $article[2];
    $dataArticles[$i]['categorie'] = $article[3];
    $i++;
}

$j = 0;
while ($category = $categoriesArray->fetch_row()) {
    $dataCategories[$j]['id'] = $category[0];
    $dataCategories[$j]['libelle'] = $category[1];
    $j++;
}


?>

<script>

const displayCategories = () => {

let dataCategories = <?php echo json_encode($dataCategories); ?>;
dataCategories.unshift({ 'id': 0, "libelle": "Accueil" });
console.log(dataCategories);

let categoryDocument = document.getElementById("header");
for (let index = 0; index < dataCategories.length; index++) {
    const element = dataCategories[index];
    console.log(element.id);
    const item = document.createElement("li")
    item.setAttribute("class", "item")
    const listContent = document.getElementById("list-item");
    item.textContent = element.libelle
    listContent.appendChild(item)
    categoryDocument.appendChild(listContent)
}

}

const displayArticlesPerCategory = () => {
let articles = <?php echo json_encode($dataArticles); ?>;
console.log(articles);
let category = document.querySelectorAll(".item")
let content = document.getElementById("content")

for (let k = 0; k < articles.length; k++) {
    let div = document.createElement("div")
    let h = document.createElement("h1");
    h.innerHTML = articles[k].titre;
    let p = document.createElement("p")
    p.innerHTML = articles[k].contenu;
    div.appendChild(h);
    div.appendChild(p);
    content.appendChild(div)
}


for (let i = 0; i < category.length; i++) {
    category[i].addEventListener("click", () => {
        if (i == 0) {
            content.innerHTML = '';
            for (let j = 0; j < articles.length; j++) {
                let div, h, p;
                div = document.createElement("div")
                h = document.createElement("h1");
                p = document.createElement("p")
                h.innerHTML = articles[j].titre;
                p.innerHTML = articles[j].contenu;
                div.appendChild(h);
                div.appendChild(p);
                content.appendChild(div);
            }
        } else {
            content.innerHTML = ''
            for (let index = 0; index < articles.length; index++) {
                const element = articles[index];
                if(element.categorie == i){
                    let div1 = document.createElement("div");
                    let p1 = document.createElement("p");
                    let h1 = document.createElement("h1");
                    h1.innerHTML = element.titre 
                    p1.innerHTML = element.contenu
                    div1.appendChild(h1);
                    div1.appendChild(p1);
                    content.appendChild(div1);
                }
                
            }
            if(content.textContent == '')
                content.innerHTML = `
                    <h1>Aucun article trouve</h1>
                `
            
        }
    })
}

}

displayCategories()
displayArticlesPerCategory()

</script>

</html>
function afficherListe(capteurs) {
    const ul = document.getElementById("resultats");
    ul.innerHTML = "";

    if (!capteurs || capteurs.length === 0) {
        ul.innerHTML = "<li>Aucun résultat</li>";
        return;
    }

    capteurs.forEach(c => {
        const li = document.createElement("li");

        const label = c.type + " (" + c.identifiantCommunication + ")";
        li.textContent = label + " - ID : " + c.idCapteur;

        ul.appendChild(li);
    });
}

async function rechercherCapteurs(texte) {
    if (texte.length === 0) {
        document.getElementById("resultats").innerHTML = "";
        return;
    }

    try {
        const response = await fetch("../api/getall.php");
        const data = await response.json();

        console.log("DATA REÇUE :", data);

        const t = texte.toLowerCase();

        const filtres = data.filter(c =>
            (c.type && c.type.toLowerCase().includes(t)) ||
            (c.identifiantCommunication && c.identifiantCommunication.toLowerCase().includes(t)) ||
            (c.modeCommunication && c.modeCommunication.toLowerCase().includes(t))
        );

        afficherListe(filtres);

    } catch (error) {
        console.error("Erreur FETCH :", error);
    }
}

document.getElementById("search").addEventListener("keyup", function() {
    rechercherCapteurs(this.value);
});

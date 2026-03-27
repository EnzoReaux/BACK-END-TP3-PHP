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

function rechercherCapteurs(texte) {
    if (texte.length === 0) {
        document.getElementById("resultats").innerHTML = "";
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "../api/getall.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);
            console.log("DATA REÇUE :", data);
            const t = texte.toLowerCase();
            const filtres = data.filter(c =>
                (c.type && c.type.toLowerCase().includes(t)) ||
                (c.identifiantCommunication && c.identifiantCommunication.toLowerCase().includes(t)) ||
                (c.modeCommunication && c.modeCommunication.toLowerCase().includes(t))
            );
            afficherListe(filtres);
        }
    };
    xhr.send(null);
}

document.getElementById("search").addEventListener("keyup", function() {
    rechercherCapteurs(this.value);
});

/*
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
/*
function rechercherCapteurs(texte) {
    if (texte.length === 0) {
        document.getElementById("resultats").innerHTML = "";
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "/api/getall.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);
            console.log("DATA REÇUE :", data);
            const t = texte.toLowerCase();
            const filtres = data.filter(c =>
                (c.type && c.type.toLowerCase().includes(t)) ||
                (c.identifiantCommunication && c.identifiantCommunication.toLowerCase().includes(t)) ||
                (c.modeCommunication && c.modeCommunication.toLowerCase().includes(t))
            );
            afficherListe(filtres);
        }
    };
    xhr.send(null);
}

document.getElementById("search").addEventListener("keyup", function() {
    rechercherCapteurs(this.value);
});function afficherListe(capteurs) {
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

function rechercherCapteurs(texte) {
    if (texte.length === 0) {
        document.getElementById("resultats").innerHTML = "";
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "/api/getall.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);
            console.log("DATA REÇUE :", data);
            const t = texte.toLowerCase();
            const filtres = data.filter(c =>
                (c.type && c.type.toLowerCase().includes(t)) ||
                (c.identifiantCommunication && c.identifiantCommunication.toLowerCase().includes(t)) ||
                (c.modeCommunication && c.modeCommunication.toLowerCase().includes(t))
            );
            afficherListe(filtres);
        }
    };
    xhr.send(null);
}

document.getElementById("search").addEventListener("keyup", function() {
    rechercherCapteurs(this.value);
});function afficherListe(capteurs) {
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

function rechercherCapteurs(texte) {
    if (texte.length === 0) {
        document.getElementById("resultats").innerHTML = "";
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "/api/getall.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);
            console.log("DATA REÇUE :", data);
            const t = texte.toLowerCase();
            const filtres = data.filter(c =>
                (c.type && c.type.toLowerCase().includes(t)) ||
                (c.identifiantCommunication && c.identifiantCommunication.toLowerCase().includes(t)) ||
                (c.modeCommunication && c.modeCommunication.toLowerCase().includes(t))
            );
            afficherListe(filtres);
        }
    };
    xhr.send(null);
}

document.getElementById("search").addEventListener("keyup", function() {
    rechercherCapteurs(this.value);
});function afficherListe(capteurs) {
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

function rechercherCapteurs(texte) {
    if (texte.length === 0) {
        document.getElementById("resultats").innerHTML = "";
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "../api/capteur/getall.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);
            console.log("DATA REÇUE :", data);
            const t = texte.toLowerCase();
            const filtres = data.filter(c =>
                (c.type && c.type.toLowerCase().includes(t)) ||
                (c.identifiantCommunication && c.identifiantCommunication.toLowerCase().includes(t)) ||
                (c.modeCommunication && c.modeCommunication.toLowerCase().includes(t))
            );
            afficherListe(filtres);
        }
    };
    xhr.send(null);
}

document.getElementById("search").addEventListener("keyup", function() {
    rechercherCapteurs(this.value);
});*/
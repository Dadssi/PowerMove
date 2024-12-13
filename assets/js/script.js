// const menuBtn = document.getElementById('menuBtn');
//         const mobileMenu = document.getElementById('mobileMenu');

//         menuBtn.addEventListener('click', () => {
//             mobileMenu.classList.toggle('hidden');
//         });
        // document.getElementById('telephone').addEventListener('keypress', function (e) {
        //     const char = String.fromCharCode(e.keyCode);
        //         if (!/[0-9]/.test(char)) {
        //     e.preventDefault();
        //     }
        // });




        // let yogaActivity = document.getElementById("activite-1");
        // let workoutActivity = document.getElementById("activite-2");
        // let cardioActivity = document.getElementById("activite-3");

        // function afficherYoga(){
        //         yogaActivity.classList.remove("hidden");
        //         workoutActivity.classList.add("hidden");
        //         cardioActivity.classList.add("hidden");
        // };
        // function afficherWorkout(){
        //         yogaActivity.classList.add("hidden");
        //         workoutActivity.classList.remove("hidden");
        //         cardioActivity.classList.add("hidden");
        // };
        // function afficherCardio(){
        //         yogaActivity.classList.add("hidden");
        //         workoutActivity.classList.add("hidden");
        //         cardioActivity.classList.remove("hidden");
        // };


        
        // Récupérer tous les boutons "Voir détails" dynamiquement
let activityButtons = document.querySelectorAll('[href^="#activite-"]');

// Fonction pour afficher une activité et masquer les autres
function afficherActivite(id) {
    // Récupérer tous les éléments ayant une activité
    let allActivities = document.querySelectorAll('[id^="activite-"]');
    
    // Parcourir toutes les activités pour afficher/masquer
    allActivities.forEach(activity => {
        if (activity.id === id) {
            activity.classList.remove("hidden"); // Afficher
        } else {
            activity.classList.add("hidden"); // Masquer
        }
    });
}

// Ajouter des événements click dynamiquement aux boutons
activityButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        event.preventDefault(); // Éviter le comportement par défaut du lien
        let targetId = button.getAttribute('href').substring(1); // Extraire l'ID cible
        afficherActivite(targetId); // Appeler la fonction avec l'ID
    });
});

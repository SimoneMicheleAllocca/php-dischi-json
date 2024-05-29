const { createApp } = Vue;

// Crea l'app Vue
createApp({
    data() {
        return {
            dischi: [], // Array i dischi
            apiUrl: "http://localhost/boolean/php-dischi-json/server.php", // URL dell'API
        };
    },
    created() {
        this.vediTutti(); // Chiamata alla funzione vediTutti 
    },
    methods: {
        // Funzione per ottenere tutti i dischi dall'API
        vediTutti() {
            axios
                .get(this.apiUrl) //richiesta GET all'API
                .then((resp) => {
                    this.dischi = resp.data.results; // Aggiorna l'array dischi con i dati ottenuti dall'API
                    console.log(this.dischi);
                });
        },
        // Funzione per il like/dislike di un disco
        likeDisc(index) {
            console.log(index);
            this.dischi[index].disc_like = !this.dischi[index].disc_like; // Cambia lo stato del like/dislike del disco
            const data = { index: index }; // Crea un oggetto con l'indice del disco
            axios
                .post(this.apiUrl, data, { // Effettua una richiesta POST all'API per aggiornare il like/dislike del disco
                    headers: {
                        "Content-Type": "multipart/form-data", // Imposta l'header Content-Type
                    },
                })
                .then((resp) => {
                    console.log(resp);
                    
                });
        },
        // Funzione per visualizzare solo i preferiti
        preferiti() {
            const data = { action_prefer: "like" }; // Crea un oggetto con l'azione di visualizzazione dei preferiti
            axios
                .post(this.apiUrl, data, { // Effettua una richiesta POST all'API per ottenere i preferiti
                    headers: {
                        "Content-Type": "multipart/form-data", // Imposta l'header Content-Type
                    },
                })
                .then((resp) => {
                    console.log(resp); 
                    this.dischi = resp.data.results; // Aggiorna l'array dischi con i dati ottenuti dall'API
                });
        },
    },
}).mount("#app");
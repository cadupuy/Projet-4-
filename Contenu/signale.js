class Signale {
    constructor(signalement) {
        this.signalement = signalement;
        this.signaler();
    }

    signaler() {
        this.signalement.addEventListener('click', () => {
            console.log("bonjour")
            alert('Le commentaire a été signalé.');

        });
    }
}

let signalement1 = new Signale(document.getElementsByClassName('signaler'));
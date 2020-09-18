class Signale {
    constructor(signalement) {
        this.signalement = signalement;
        this.signaler();
    }

    signaler() {
        this.signalement.addEventListener('click', () => {
            alert('Le commentaire a été signalé.');

        });
    }
}

let signalement1 = new Signale(document.getElementById('signaler'));
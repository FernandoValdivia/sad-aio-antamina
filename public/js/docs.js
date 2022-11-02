var distrito = document.getElementById('unidadt').innerHTML;

switch (distrito) {
    case 'Aquia (Bolognesi / Áncash)':
        document.getElementById("utAIO").className = "class-list-none";
        document.getElementById("utAquia").className = "class-list-block";
        break;
    case 'Chiquián':
        document.getElementById("utAIO").className = "class-list-none";
        document.getElementById("utChiquian").className = "class-list-block";
        break;
    default:
        document.getElementById("utAIO").className = "class-list-block";
        break;
}
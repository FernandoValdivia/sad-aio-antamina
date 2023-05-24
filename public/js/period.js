//Obtener el valor del select y colocarlo en el id del periodo
const selectElement = document.getElementById("years");
const periodElement = document.getElementById("period");

const updatePeriod = () => {
const selectedOption = selectElement.options[selectElement.selectedIndex];
    periodElement.innerHTML = selectedOption.text;
};

selectElement.addEventListener("change", updatePeriod);

updatePeriod();
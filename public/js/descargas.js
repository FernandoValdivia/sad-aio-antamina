function cambiarReporte() {
    var select = document.getElementById("selectReporte");
    var valorSeleccionado = select.options[select.selectedIndex].value;
    
    // Actualizar las etiquetas y enlaces dependiendo de la opción seleccionada
    switch (valorSeleccionado) {
        case "reporte1":
            document.getElementById("name__reporte__1").innerText = "Reporte 2T 2022";
            document.getElementById("name__reporte__2").innerText = "Reporte 2T 2022";
            document.getElementById("reporte__pdf").setAttribute("href", "/descargar-pdf22022");
            document.getElementById("reporte__xlsx").setAttribute("href", "/descargar-excel22022");
            document.getElementById("pdfPreview").src = "https://drive.google.com/file/d/1FEvILx8jPbG2bPFhLGeCcKTe7px0q_b5/preview";
            break;
        case "reporte2":
            document.getElementById("name__reporte__1").innerText = "Reporte 3T 2022";
            document.getElementById("name__reporte__2").innerText = "Reporte 3T 2022";
            document.getElementById("reporte__pdf").setAttribute("href", "/descargar-pdf32022");
            document.getElementById("reporte__xlsx").setAttribute("href", "/descargar-excel32022");
            document.getElementById("pdfPreview").src = "https://drive.google.com/file/d/1oYa_DsXVJlu9dLU9BO_zvG3vl6Whl_oJ/preview";
            break;
        case "reporte3":
        document.getElementById("name__reporte__1").innerText = "Reporte 4T 2022";
            document.getElementById("name__reporte__2").innerText = "Reporte 4T 2022";
            document.getElementById("reporte__pdf").setAttribute("href", "/descargar-pdf42022");
            document.getElementById("reporte__xlsx").setAttribute("href", "/descargar-excel42022");
            document.getElementById("pdfPreview").src = "https://drive.google.com/file/d/1pxMrV-ChtzWXhw_EZJPQFpPIwEtkIILU/preview";
            break;
        case "reporte4":
        document.getElementById("name__reporte__1").innerText = "Reporte 1T 2023";
            document.getElementById("name__reporte__2").innerText = "Reporte 1T 2023";
            document.getElementById("reporte__pdf").setAttribute("href", "/descargar-pdf12023");
            document.getElementById("reporte__xlsx").setAttribute("href", "#");
            document.getElementById("pdfPreview").src = "https://drive.google.com/file/d/1CpV-dzWEtcUBAO28Akw8DC3WGvpt24Gp/preview";
            break;
        default:
            break;
    }
}
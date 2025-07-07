.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Estilos del título */
.container h2 {
    color: #333;
    font-size: 2em;
    margin-bottom: 30px;
    text-align: center;
    border-bottom: 2px solid #4CAF50;
    padding-bottom: 10px;
}

/* Estilos de la tabla */
.table-responsive {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin-bottom: 30px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin: 0;
}

/* Estilos del encabezado de la tabla */
.table thead th {
    background-color: #4CAF50;
    color: white;
    padding: 15px;
    text-align: left;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.9em;
    letter-spacing: 0.5px;
}

/* Estilos de las celdas */
.table tbody td {
    padding: 15px;
    border-bottom: 1px solid #eee;
    color: #333;
    vertical-align: middle;
}

/* Efecto hover en las filas */
.table tbody tr:hover {
    background-color: #f9f9f9;
    transition: background-color 0.3s ease;
}

/* Estilos del botón eliminar */
.btn-danger {
    background-color: #ff4444;
    color: white;
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 5px;
}

.btn-danger:hover {
    background-color: #cc0000;
    transform: translateY(-2px);
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

/* Estilos para el icono de eliminar */
.fas.fa-trash {
    font-size: 0.9em;
}

/* Estilos para el mensaje de carrito vacío */
.text-center {
    padding: 30px;
    color: #666;
    font-style: italic;
    font-size: 1.1em;
}

/* Estilos para el pie de la tabla (total) */
.table tfoot td {
    background-color: #f8f9fa;
    font-weight: bold;
    padding: 15px;
    border-top: 2px solid #dee2e6;
}

/* Estilos para los precios */
.table td:nth-child(3),
.table td:nth-child(4) {
    font-weight: 600;
    color: #2196F3;
}

/* Estilos para las alertas */
.alert {
    padding: 15px 20px;
    border-radius: 5px;
    margin-bottom: 20px;
    position: relative;
    animation: slideIn 0.3s ease-out;
}

.alert-success {
    background-color: #d4edda;
    border-left: 4px solid #28a745;
    color: #155724;
}

.alert-danger {
    background-color: #f8d7da;
    border-left: 4px solid #dc3545;
    color: #721c24;
}

.alert .close {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    font-size: 1.5em;
    cursor: pointer;
    opacity: 0.5;
    transition: opacity 0.3s;
}

.alert .close:hover {
    opacity: 1;
}

/* Animación para las alertas */
@keyframes slideIn {
    from {
        transform: translateY(-20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

/* Estilos responsivos */
@media (max-width: 768px) {
    .container {
        padding: 10px;
    }

    .table thead {
        display: none;
    }

    .table tbody tr {
        display: block;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .table tbody td {
        display: block;
        text-align: right;
        padding: 10px;
        position: relative;
        padding-left: 50%;
    }

    .table tbody td:before {
        content: attr(data-label);
        position: absolute;
        left: 10px;
        width: 45%;
        text-align: left;
        font-weight: bold;
    }

    .btn-danger {
        width: 100%;
        justify-content: center;
    }
}
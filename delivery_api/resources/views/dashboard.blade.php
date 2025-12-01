@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div style="max-width: 1200px; margin:50px auto; padding:20px; background:white; border-radius:10px; box-shadow:0 4px 15px rgba(0,0,0,0.1);">
    <h1 style="text-align:center; margin-bottom:30px; color:#1e40af;">Panel de Control</h1>

    <div style="display:flex; flex-wrap:wrap; gap:20px; justify-content:center;">

        <!-- Sección Productos -->
        <div style="flex:1; min-width:300px; background:#f9fafb; padding:20px; border-radius:8px;">
            <h2 style="color:#1e40af;">Productos 
                <button onclick="showForm('producto')" style="background:#28a745; color:white; border:none; padding:5px 10px; border-radius:4px; cursor:pointer;">+ Añadir</button>
            </h2>
            <div id="productList"></div>
        </div>

        <!-- Sección Clientes -->
        <div style="flex:1; min-width:300px; background:#f9fafb; padding:20px; border-radius:8px;">
            <h2 style="color:#1e40af;">Clientes 
                <button onclick="showForm('cliente')" style="background:#28a745; color:white; border:none; padding:5px 10px; border-radius:4px; cursor:pointer;">+ Añadir</button>
            </h2>
            <div id="clientList"></div>
        </div>

        <!-- Sección Pedidos -->
        <div style="flex:1; min-width:300px; background:#f9fafb; padding:20px; border-radius:8px;">
            <h2 style="color:#1e40af;">Pedidos 
                <button onclick="showForm('pedido')" style="background:#28a745; color:white; border:none; padding:5px 10px; border-radius:4px; cursor:pointer;">+ Añadir</button>
            </h2>
            <div id="orderList"></div>
        </div>

        <!-- Sección Repartidores -->
        <div style="flex:1; min-width:300px; background:#f9fafb; padding:20px; border-radius:8px;">
            <h2 style="color:#1e40af;">Repartidores 
                <button onclick="showForm('repartidor')" style="background:#28a745; color:white; border:none; padding:5px 10px; border-radius:4px; cursor:pointer;">+ Añadir</button>
            </h2>
            <div id="deliveryList"></div>
        </div>
    </div>

    <!-- FORMULARIO DINÁMICO -->
    <div id="formContainer" style="display:none; margin-top:30px; padding:20px; background:#f9fafb; border-radius:10px;">
        <h3 id="formTitle" style="color:#1e40af;"></h3>
        <form id="dynamicForm">
            <input type="hidden" id="itemId">
            <div id="formFields" style="margin-bottom:15px;"></div>
            <button type="submit" style="padding:10px 20px; background:#1e40af; color:white; border:none; border-radius:5px; cursor:pointer;">
                Guardar
            </button>
        </form>
    </div>
</div>

<script>
const token = localStorage.getItem('token');
if (!token) window.location.href = "{{ route('login') }}";

function fetchData(endpoint, targetDiv) {
    axios.get(`{{ url("api") }}/${endpoint}`, { headers: { Authorization: `Bearer ${token}` } })
    .then(response => {
        let html = "<table style='width:100%; border-collapse:collapse;'>";
        html += "<tr style='background:#e5e7eb;'><th>ID</th><th>Nombre</th><th>Acciones</th></tr>";
        (response.data.data || response.data).forEach(item => {
            html += `<tr style="border-bottom:1px solid #ccc;">
                        <td>${item.id}</td>
                        <td>${item.name || item.nombre || 'N/A'}</td>
                        <td>
                            <button onclick="editItem('${endpoint}', ${item.id})" style="margin-right:5px; padding:5px 10px; background:#3b82f6; color:white; border:none; border-radius:4px;">Editar</button>
                            <button onclick="deleteItem('${endpoint}', ${item.id})" style="background:#ef4444; color:white; border:none; padding:5px 10px; border-radius:4px;">Eliminar</button>
                        </td>
                    </tr>`;
        });
        html += "</table>";
        document.getElementById(targetDiv).innerHTML = html;
    });
}

function showForm(type) {
    document.getElementById('formContainer').style.display = 'block';
    document.getElementById('formTitle').innerText = `Añadir ${type}`;
    document.getElementById('itemId').value = '';
    let fields = "";
    if (type === 'producto') {
        fields += 'Nombre:<br><input type="text" id="name" style="width:100%; padding:8px; margin-bottom:10px;"><br>';
        fields += 'Precio:<br><input type="number" id="price" style="width:100%; padding:8px; margin-bottom:10px;"><br>';
    } else {
        fields += 'Nombre:<br><input type="text" id="name" style="width:100%; padding:8px; margin-bottom:10px;"><br>';
    }
    document.getElementById('formFields').innerHTML = fields;
    document.getElementById('dynamicForm').dataset.type = type;
}

function editItem(type, id) {
    showForm(type);
    document.getElementById('itemId').value = id;
    axios.get(`{{ url("api") }}/${type}/${id}`, { headers: { Authorization: `Bearer ${token}` } })
    .then(response => {
        const item = response.data.data || response.data;
        document.getElementById('name').value = item.name || item.nombre;
        if (type === 'producto') document.getElementById('price').value = item.price;
    });
}

function deleteItem(type, id) {
    if (!confirm('¿Eliminar este elemento?')) return;
    axios.delete(`{{ url("api") }}/${type}/${id}`, { headers: { Authorization: `Bearer ${token}` } })
    .then(() => loadAll());
}

function loadAll() {
    fetchData('productos', 'productList');
    fetchData('clientes', 'clientList');
    fetchData('pedidos', 'orderList');
    fetchData('repartidores', 'deliveryList');
}

document.getElementById('dynamicForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const type = e.target.dataset.type;
    const id = document.getElementById('itemId').value;
    const name = document.getElementById('name').value;
    const data = { name };

    if (type === 'producto') data.price = document.getElementById('price').value;

    if (id) {
        axios.put(`{{ url("api") }}/${type}/${id}`, data, { headers: { Authorization: `Bearer ${token}` } })
            .then(() => { loadAll(); document.getElementById('formContainer').style.display = 'none'; });
    } else {
        axios.post(`{{ url("api") }}/${type}`, data, { headers: { Authorization: `Bearer ${token}` } })
            .then(() => { loadAll(); document.getElementById('formContainer').style.display = 'none'; });
    }
});

loadAll();
</script>
@endsection

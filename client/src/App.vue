<script setup>
  import {ref, onMounted} from 'vue'
  import axios from 'axios'

  const tareas = ref([])
  const nuevaTarea = ref({
    titulo : '',
    descripcion : '',
    completed: false
  })

  const modal = ref(false)

  onMounted(async() => {
    try{
      const getTask = "http://127.0.0.1:8000/api/tasks"
      const { data } = await axios.get(getTask)
      tareas.value = data
      // console.log(data)
    }catch(e){
      console.log("Error: ", e)
    }
  })

  async function deleteTask(id){
    try{
      const response = await axios.delete(`http://127.0.0.1:8000/api/tasks/${id}`)
    }catch(e){
      console.log("Error: ", e)
    }
  }

  async function completedTask(id, event){
    try{
      const response = await axios.patch(`http://127.0.0.1:8000/api/tasks/${id}`, { completed: event.target.checked})
    }catch(e){
      console.log("Error: ", e)
    }
  }

  async function addTask(){
    try{
      const { data } = await axios.post('http://127.0.0.1:8000/api/tasks', nuevaTarea.value)
      tareas.value.push(data)
      modal.value = false

      nuevaTarea.value = {titulo: '', descripcion: '', completed: false}
    }catch(e){
      console.log("Error: ", e)
    }
  }

  const abrirModal = () => {
    modal.value = true
  }

</script>

<template>
  <div class="container">
    <!-- Titulo -->
    <div class="titulo">
      <h2>Lista de tareas</h2>
      <button @click="abrirModal">Nueva Tarea</button>
    </div>

    <!-- Lista -->
    <div v-for="tarea in tareas" :key="tarea.id">
      <div class="container-list">
        <div class="lista">
          <h4>{{tarea.titulo}}</h4>
          <span>{{tarea.descripcion}}</span>
        </div>
        
        <div>
          <input type="checkbox" :checked="tarea.completed" name="completed" id="completed" @click="completedTask(tarea.id, $event)">
          <button @click="deleteTask(tarea.id)">Eliminar</button>
        </div>
      </div>
    </div>

    <!-- Formulario -->
    <div v-show="modal" class="form">
      <button @click="modal = false" type="button" class="close-modal">X</button>

      <h1>Nueva Tarea</h1>

      <label>Tarea</label>
      <input v-model="nuevaTarea.titulo" type="input" id="titulo" placeholder="Titulo" >
      <label>Descripcion</label>
      <input v-model="nuevaTarea.descripcion" type="input" id="descripcion" placeholder="Descripcion" >

      <br>

      <button @click="addTask">Agregar Tarea</button>
    </div>

  </div>
</template>

<style scoped>
  .container{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }
  .titulo{
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
    height: 50px;
    margin-bottom: 40px;
  }
</style>

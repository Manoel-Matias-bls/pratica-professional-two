<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Configurações</div>

                    <div class="panel-body">
                        <h4>Alterar Categorias</h4>
                        <div class="form-group">

                            <label>Nome categoria:</label>
                            <select class="form-control" v-model="selected">
                                <option v-for="categoria in this.cats" :value="categoria">{{ categoria.nome }}</option>
                            </select>

                            <label>Valor:</label>
                            <money v-model="selected.valor" v-bind="money" class="form-control"></money>
                        </div>
                        <button type="submit" @click="submit" class="btn btn-primary">Salvar Alterações</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

// import { TheMask } from 'vue-the-mask'
import {Money} from 'v-money'

export default {
    props: ['categorias'],
    name: 'edit-config',
    components: {
      Money,
      // TheMask
    },
    mounted() {
        //
    },
    data () {
      return {
        selected: {},
        cats: JSON.parse(this.categorias),
        money: {
          decimal: ',',
          thousands: '.',
          prefix: 'R$ ',
          suffix: '',
          precision: 2,
          masked: false
        }
      }
    },
    methods: {
      submit () {
        axios.patch('/configuracoes/categorias', {'id': this.selected.id, 'valor': this.selected.valor}).then(function (response) {
          console.log(response);
        })
      }
    }
}
</script>

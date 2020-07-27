<template>
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-fw fa-user pr-2 mycolor-azul"></i>
                        Gerenciar Perfil Psicologo
                    </div>
                    <div class="card-body">
                        <informacoes-pessoais-usuario :funcionario='funcionario'></informacoes-pessoais-usuario>
                        <informacoes-contato-usuario :funcionario='funcionario'></informacoes-contato-usuario>
                        <informacoes-profissionais-usuario :funcionario='funcionario'></informacoes-profissionais-usuario>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:{
        funcionario: {
            type: Object,
            required: true,
        }
    },
}
</script>

<style>

</style>
<template>
    <div>
        <!-- CALENDARIO -->
        <div ref="calendar"></div>

        <!-- MODAL DE DETALHES DA CONSULTA -->
        <detalhes-consulta ref="modalConsulta"></detalhes-consulta>

        <!-- MODAL DE ALTERAÇÃO DA SITUACAO DO ATENDIMENTO -->
        <alterar-situacao ref="modalAlterarSituacao"></alterar-situacao>

        <!-- MODAL DE AÇÕES -->
        <acoes-atendimento ref="modalAcoes" :base_url="base_url"></acoes-atendimento>

        <!-- MODAL DE ADICIONAR OBSERVACAO -->
        <adicionar-observacao ref="modalAdicionarObservacao"></adicionar-observacao>
    </div>
</template>
<script>
    import {Calendar} from '@fullcalendar/core';
    import bootstrapPlugin from '@fullcalendar/bootstrap';
    import timeGridPlugin from '@fullcalendar/timegrid';
    import ptBrLocale from '@fullcalendar/core/locales/pt-br';
    import DetalhesConsulta from "./DetalhesConsultaComponent";
    import AcoesAtendimento from "./AcoesAtendimentoComponent";
    import AlterarSituacao from "./AlterarSituacaoComponent";
    import AdicionarObservacao from "./AdicionarObservacaoComponent";

    export default {
        name: "VerCalendario",
        components: {
            DetalhesConsulta,
            AcoesAtendimento,
            AlterarSituacao,
            AdicionarObservacao
        },
        props: {
            base_url: {
                type: String
            }
        },
        data() {
            return {
                evento: {},
                calendar: {},
                dadosAtendimento: null,
            }
        },
        methods: {
            openAcoesModal: function () {
                this.$refs.modalAcoes.show(this.dadosAtendimento.extendedProps);
            },
            openAlterarSituacaoModal: function (){
              this.$refs.modalAlterarSituacao.show(this.dadosAtendimento);
            },
            openAdicionarObservacaoModal: function (){
                this.$refs.modalAdicionarObservacao.show(this.dadosAtendimento.extendedProps.id_atendimento);
            },
            openDetalhesModal: function () {
                this.$refs.modalConsulta.show(this.dadosAtendimento);
            },
            async atualizarCalendario () {
                await this.calendar.refetchEvents();
            }
        },
        mounted: function () {
            let vm = this, calendarEl = vm.$refs.calendar;
            vm.calendar = new Calendar(calendarEl, {
                plugins: [timeGridPlugin, bootstrapPlugin],
                editable: false,
                initialView: 'timeGridWeek',
                themeSystem: 'bootstrap',
                allDaySlot: false,
                hiddenDays: [0, 6],
                locale: ptBrLocale,
                slotMinTime: "08:00",
                slotMaxTime: "19:00",
                slotDuration: {hours: 1},
                contentHeight: 'auto',
                nowIndicator: true,
                expandRows: true,
                slotLabelClassNames: 'teste',
                events: '/consultasPsicologo',
                eventClick: function (info) {
                    //Salvar dados do atendimento selecionado
                    vm.dadosAtendimento = info.event;

                    //Abrir o modal de ações
                    vm.openAcoesModal();
                },
                slotLabelFormat: {
                    hour: 'numeric',
                    minute: '2-digit',
                    omitZeroMinute: false,
                    meridiem: 'short'
                },
                eventTimeFormat: {
                    hour: '2-digit',
                    minute: '2-digit',
                    meridiem: false
                },
                headerToolbar: {
                    left: '',
                    center: 'title',
                    right: 'prev,next'
                }
            })
            vm.calendar.render();
        }
    }
</script>
<style>
    .fc .fc-timegrid-slot {
        height: 3.5em;
    }

    .fc-event-title.fc-sticky {
        font-size: 1rem;
    }

    .fc-timegrid-event .fc-event-main {
        padding: 2px 2px 0;
    }

    .fc-timegrid-event .fc-event-main:hover {
        cursor: pointer;
    }

    th.fc-col-header-cell.fc-day {
        background-color: #407ab9;
        height: 50px;
        color: white;
        vertical-align: middle;
    }
</style>
<template>
    <div>
        <div ref="calendar"></div>
        <detalhes-consulta ref="modalConsulta"></detalhes-consulta>
    </div>
</template>
<script>
    import {Calendar} from '@fullcalendar/core';
    import bootstrapPlugin from '@fullcalendar/bootstrap';
    import timeGridPlugin from '@fullcalendar/timegrid';
    import ptBrLocale from '@fullcalendar/core/locales/pt-br';
    import DetalhesConsulta from "./DetalhesConsultaComponent";

    export default {
        name: "VerCalendario",
        components: {
            DetalhesConsulta
        },
        data() {
            return {
                evento: {},
                calendar: {}
            }
        },
        methods:{
            openModal(detalhes) {
                this.$refs.modalConsulta.show(detalhes);
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
                events: '/consultasPsicologo',
                eventClick: function (info) {
                    vm.openModal(info.event);
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
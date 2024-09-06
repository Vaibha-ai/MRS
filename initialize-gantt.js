let data =  [
        {
            recordID: 1,
            row: "OP1",
            start: "Wed Jun 03 2020 14:21:55",
            end: "Wed Jun 03 2020 20:21:55",
            tooltip: "Patient 1 || 14:21:55 - 17:21:55"
        },
        {
            recordID: 2,
            row: "OP2",
            start: "Jun 03 2020 11:00:00",
            end: "Jun 03 2020 15:23:43",
            tooltip: "Patient 2 || 11:00:00 - 15:23:43"
        },
        {
            recordID: 3,
            row: "OP3",
            start: "Wed Jun 03 2020 01:00:00",
            end: "Wed Jun 03 2020 10:00:00",
            tooltip: "Patient 3 || 01:00:00 - 10:00:00"
        },
        {
            recordID: 4,
            row: "OP4",
            start: "Wed Jun 03 2020 06:00:00",
            end: "Wed Jun 03 2020 10:00:00",
            tooltip: "Patient 4 || 06:00:00 - 10:00:00"
        },
        {
            recordID: 5,
            row: "OP5",
            start: "Wed Jun 03 2020 03:30:00",
            end: "Wed Jun 03 2020 7:00:00",
            tooltip: "Patient 5 || 03:30:00 - 7:00:00"
        },
        {
            recordID: 6,
            row: "OP6",
            start: "Wed Jun 03 2020 21:30:00",
            end: "Wed Jun 03 2020 24:00:00",
            tooltip: "Patient 6 || 21:30:00 - 24:00:00"
        }
    ];


//This could be an API call to grab data
function refreshFunction() {
    return data;
}

//Parameters that the chart expects
let params = {
    sidebarHeader: "Unused right now",
    noDataFoundMessage: "No data found",
    startTimeAlias: "start",
    endTimeAlias: "end",
    idAlias: "recordID",
    rowAlias: "row",
    linkAlias: null,
    tooltipAlias: "tooltip",
    groupBy: null,
    groupByAlias: null,
    refreshFunction: refreshFunction
}

//Create the chart.
//On first render the chart will call its refreshData function on its own.
let ganttChart = new Gantt("chart", params);

//To refresh the chart's data
ganttChart.refreshData();
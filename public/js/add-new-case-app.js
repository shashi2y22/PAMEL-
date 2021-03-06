var app = Vue.createApp({
    data() {
        return {
            config: {
                lesson: {
                    caseTitle: null,
                    mmlaGoal: null,
                    date: null,
                    startTime: null,
                    endTime: null,
                },
                activities: {
                    count: 0,
                    data: [],
                },
                dataSources: {
                    count: 0,
                    data: [],
                },
                columnsRequiredInFusedFile: {
                    count: 0,
                    fusionbasedOn: null,
                    timeWindow: null,
                    data: [],
                },
            },
            singleActivity: {
                id: 1,
                type: null,
                startTime: null,
                endTime: null,
            },
            singleDataSource: {
                id: 1,
                name: null,
                dataSourceType: null,
                activityType: null,
                frequency: null,
                timezone: null,
                dataFiles: 0,
                fileRelation: null,
                sourceType: "Local System",
                path: null,
                // Preparation
                preparation: {
                    synchronization: {
                        requires: "NO",
                        rule: null,
                    },
                    timeHomoGeneration: {
                        requires: "NO",
                    },
                    dataTrimming: {
                        requires: "NO",
                        data: {
                            rows: [{ from: 0, to: 1 }],
                            cols: [{ from: 0, to: 1 }],
                        },
                    },
                    denoising: {
                        requires: "NO",
                        removeDuplicates: false,
                        rule: null,
                    },
                },
                // Organisation
                organisation: {
                    transformation: {
                        requires: "NO",
                        rule: null,
                    },
                    actors: {
                        colNo: null,
                        rule: null,
                    },
                    verbs: {
                        colNo: null,
                        rule: null,
                    },
                    objects: {
                        colNo: null,
                        rule: null,
                    },
                    variablesExcluder: {
                        data: [{ from: 0, to: 1 }],
                    },
                },
                // Fusion
                fusion: {
                    type: null,
                    caseAggregation: {
                        requires: "NO",
                        verb1: {
                            addRule: null,
                            missingRule: null,
                        },
                        object1: {
                            addRule: null,
                            missingRule: null,
                        },
                    },
                },
            },
            columnInFusedFile: {
                id: 1,
                type: null,
                integrationRule: null,
                missingRule: null,
            },
            addMoreActivitiesCount: 1,
            addMoreDataSourcesCount: 1,
        };
    },
    created() {
        this.addMoreActivities();
        // this.addMoreDataSources();
        // this.addMoreDataSources();
        // this.addMoreDataSources();

        // this.config.dataSources.data[0].name = "Extracted Features";
        // this.config.dataSources.data[1].name = "Student Evaluation";
        // this.config.dataSources.data[2].name = "Teacher Perception";

        this.addMoreFusedFileColumns();
    },
    methods: {
        addMoreActivities() {
            for (
                let count = this.config.activities.count;
                count <
                parseInt(this.config.activities.count) +
                    parseInt(this.addMoreActivitiesCount);
                count++
            ) {
                let newActivity = JSON.parse(
                    JSON.stringify(this.singleActivity)
                );
                newActivity.id = count + 1;
                this.config.activities.data.push(newActivity);
            }

            this.config.activities.count = this.config.activities.data.length;
        },
        addMoreDataSources() {
            for (
                let count = this.config.dataSources.count;
                count <
                parseInt(this.config.dataSources.count) +
                    parseInt(this.addMoreDataSourcesCount);
                count++
            ) {
                let newDataSource = JSON.parse(
                    JSON.stringify(this.singleDataSource)
                );
                newDataSource.id = count + 1;
                newDataSource.name = "DS " + (count + 1);
                this.config.dataSources.data.push(newDataSource);
            }

            this.config.dataSources.count = this.config.dataSources.data.length;
        },
        addMoreFusedFileColumns() {
            let currentCount = this.config.columnsRequiredInFusedFile.count;
            let newcolumnInFusedFile = JSON.parse(
                JSON.stringify(this.columnInFusedFile)
            );
            newcolumnInFusedFile.id = currentCount + 1;
            this.config.columnsRequiredInFusedFile.data.push(
                newcolumnInFusedFile
            );

            this.config.columnsRequiredInFusedFile.count =
                this.config.columnsRequiredInFusedFile.data.length;
        },
        addNewDataTrimRow(dataSourceId) {
            this.config.dataSources.data[
                dataSourceId
            ].preparation.dataTrimming.data.rows.push({
                from: 0,
                to: 0,
            });
        },
        addNewDataTrimCol(dataSourceId) {
            this.config.dataSources.data[
                dataSourceId
            ].preparation.dataTrimming.data.cols.push({
                from: 0,
                to: 0,
            });
        },
        addNewVarExcluder(dataSourceId) {
            this.config.dataSources.data[
                dataSourceId
            ].organisation.variablesExcluder.data.push({
                from: 0,
                to: 0,
            });
        },
        async aggregateForms(event) {
            let dsID = parseInt(event.target.children[1].value);
            console.log(dsID);
            let sourceType = this.config.dataSources.data[dsID].sourceType;
            let dsName = this.config.dataSources.data[dsID].name;
            let caseTitle = this.config.lesson.caseTitle;
            let data;

            document.querySelector("#add-new-case-div > div:nth-child(1)").classList.add("loader");

            if (sourceType == "G Drive") {
                let apiUrl = event.target.children[4].value;
                let formData = new FormData();
                formData.append("sheetID", apiUrl.match("/d/(.*?)(/|$)")[1]);
                formData.append("sourceType", sourceType);
                formData.append("dsName", dsName);
                formData.append("caseTitle", caseTitle);

                const { data } = await axios.post("/aggregateFiles", formData);

                console.log(data);
                if (data != "_NO_CSV_FILE_AVAILABLE__")
                    this.config.dataSources.data[dsID].path = data;
                else
                    alert(
                        "Data can't be converted due to some unexpected error. Please try again for data source: " +
                            this.config.dataSources.data[dsID].name
                    );
            } else {
                let formData = new FormData(event.target);
                formData.append("sourceType", sourceType);
                formData.append("dsName", dsName);
                formData.append("caseTitle", caseTitle);

                const { data } = await axios.post("/aggregateFiles", formData, {
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                        "Content-Type": "multipart/form-data",
                    },
                });

                console.log(data);
                if (data != "_NO_CSV_FILE_AVAILABLE__")
                    this.config.dataSources.data[dsID].path = data;
                else
                    alert(
                        "Data can't be converted due to some unexpected error. Please try again for data source: " +
                            this.config.dataSources.data[dsID].name
                    );
            }
            document.querySelector("#add-new-case-div > div:nth-child(1)").classList.remove("loader");
        },
        async preparation(event) {
            document.querySelector("#add-new-case-div > div:nth-child(1)").classList.add("loader");
            const { data } = await axios.post("/preparation", {
                dataSources: this.config.dataSources,
                caseTitle: this.config.lesson.caseTitle,
            });
            console.log(data);
            document.querySelector("#add-new-case-div > div:nth-child(1)").classList.remove("loader");
            Swal.fire({
                title: "Preparation Completed!",
                text: "You can Proceed to Organisation Step",
                icon: "success",
                confirmButtonText: "Ok",
            });
        },
        async organisation(event) {
            document.querySelector("#add-new-case-div > div:nth-child(1)").classList.add("loader");
            const { data } = await axios.post("/organisation", {
                dataSources: this.config.dataSources,
                caseTitle: this.config.lesson.caseTitle,
            });
            console.log(data);
            document.querySelector("#add-new-case-div > div:nth-child(1)").classList.remove("loader");
            Swal.fire({
                title: "Organisation Completed!",
                text: "You can Proceed to Fusion Step",
                icon: "success",
                confirmButtonText: "Ok",
            });
        },
        async fusion(event) {
            document.querySelector("#add-new-case-div > div:nth-child(1)").classList.add("loader");
            const { data } = await axios.post("/fusion", this.config);

            console.log(data);
            document.querySelector("#add-new-case-div > div:nth-child(1)").classList.remove("loader");
            Swal.fire({
                title: "Fusion Completed!",
                text: "Head over to the Data Processing tab from top menu to download all your files",
                icon: "success",
                confirmButtonText: "Ok",
            });
        },
        downloadLatestConfig() {
            this.SaveAsFile(
                JSON.stringify(this.config),
                "config.json",
                "application/json;charset=utf-8"
            );
        },
        SaveAsFile(t, f, m) {
            try {
                var b = new Blob([t], { type: m });
                saveAs(b, f);
            } catch (e) {
                window.open(
                    "data:" + m + "," + encodeURIComponent(t),
                    "_blank",
                    ""
                );
            }
        },
        async addNewCase_POST() {
            const { data } = await axios.post("/addNewCase", this.config);
            console.log(data);
        },
    },
});
app.mount("#add-new-case-app");

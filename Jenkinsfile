pipeline {
    agent any

    stages {
        stage('Test') {
            steps {
                /* `make check` returns non-zero on test failures,
                * using `true` to allow the Pipeline to continue nonetheless
                */
                sh '/Users/shwetasharma/Documents/mink_behat/run-behat.sh'
            }
        }

        stage('Import results to Xray') {
            def description = "Automated test execution"
            def labels = '["automated_xray_execution","automated_regression"]'
            def testExecutionFieldId = 10511
            def projectKey = "GLT"
            def xrayConnectorId = '11dc8400-a3f0-49e0-9370-1125200ef522'
            steps {
                step([$class: 'XrayImportBuilder', endpointName: '/junit', importFilePath: 'results/default.xml', importToSameExecution: 'true', projectKey: 'GLT', serverInstance: 'CLOUD-11dc8400-a3f0-49e0-9370-1125200ef522', testExecKey: 'GLT-2166'])
            }
        }
    }
}

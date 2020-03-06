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
    }
}

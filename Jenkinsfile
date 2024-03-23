pipeline {
    agent any
    stages {
        stage('sonarqube') {
            steps{
                script { scannerHome = tool 'SonarQube Scanner' }
                withSonarQubeEnv('ows-sonarqube') {
                    sh "${scannerHome}/bin/sonar-scanner -Dsonar.projectKey=ows"
                }
            }
        }
    }
}
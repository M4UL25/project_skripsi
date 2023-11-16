<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis Interaktif</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #EBF3E8;
        }

        .card {
            max-width: 600px;
            margin: auto;
            margin-top: 10%;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .quiz-container {
            padding: 20px;
        }

        .result {
            font-weight: bold;
            margin-top: 20px;
        }

        .btn-answer {
            width: 100%;
            margin-top: 10px;
        }

        .btn-exit {
            width: 100%;
            margin-top: 20px;
        }

        .exit-container {
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="card">
        <div class="card-body quiz-container row">
            <!-- Input nama -->
            <div id="name-input" class="mb-3">
                <h2 class="mb-4">Quiz Sosial</h2>
                <label for="inputName" class="form-label">Masukkan Nama Anda:</label>
                <input type="text" class="form-control" id="inputName">
                <button class="btn btn-primary mt-2" onclick="startQuiz()">Mulai Kuis</button>
                <a href="../quiz.php" class="btn btn-danger mt-2">Keluar</a>
            </div>

            <!-- Kuis container (akan muncul setelah input nama) -->
            <div id="quiz" class="" style="display: none;">
                <!-- Soal dan jawaban -->
            </div>

            <!-- Hasil Skor -->
            <div id="results" class="result"></div>

            <!-- Tombol Exit -->
            <div class="exit-container col-sm-4">
                <button id="exitBtn" class="btn btn-danger btn-exit" onclick="exitQuiz()"
                    style="display: none;">Keluar</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var currentQuestionIndex = 0;
        var score = 0;
        var playerName = "";

        var questions = [
            { //1
                question: "Yang termasuk bencana kegagalan sosial?",
                answers: [
                    { text: "Konflik", correct: true },
                    { text: "Gempa", correct: false },
                    { text: "Limbah", correct: false },
                    { text: "Wabah", correct: false }
                ]
            },
            { //2
                question: "Apa yang dimaksud dengan bencana sosial?",
                answers: [
                    { text: "Bencana yang terjadi akibat kegagalan teknologi", correct: false },
                    { text: "Bencana yang menimbulkan dampak besar terhadap masyarakat", correct: true },
                    { text: "Bencana yang disebabkan oleh faktor alam", correct: false },
                    { text: "Bencana yang hanya terjadi di bidang ekonomi", correct: false }
                ]
            },
            { //3
                question: "Faktor apa yang dapat menyebabkan bencana sosial?",
                answers: [
                    { text: "Aktivitas vulkanik dan gempa bumi", correct: false },
                    { text: "Konflik sosial, ketidaksetaraan, dan kemiskinan", correct: true },
                    { text: "Pemanasan global dan perubahan iklim", correct: false },
                    { text: "Kelebihan penduduk dan urbanisasi", correct: false }
                ]
            },
            { //4
                question: "Apa peran pemerintah dalam penanggulangan bencana sosial?",
                answers: [
                    { text: "Memperburuk situasi", correct: false },
                    { text: "Menyediakan bantuan dan perlindungan sosial", correct: true },
                    { text: "Hanya menyelamatkan diri sendiri", correct: false },
                    { text: "Mengabaikan peran dalam penanggulangan bencana sosial", correct: false }
                ]
            },
            { //5
                question: "Gempa bumi sanggup menjadikan kerusakan yang bervariasi tergantung pada kekuatan gempa tersebut. Alat yang dipakai untuk mencatat kekuatan gempa adalah...",
                answers: [
                    { text: "Altimeter", correct: false },
                    { text: "Seismograf", correct: true },
                    { text: "Anemometer", correct: false },
                    { text: "Termograf", correct: false }
                ]
            },
            { //6
                question: "Apa definisi bencana sosial?",
                answers: [
                    { text: "Kejadian alam yang merugikan masyarakat", correct: false },
                    { text: "Kejadian yang disebabkan oleh faktor manusia dan merugikan masyarakat", correct: true },
                    { text: "Kejadian yang hanya terjadi di bidang ekonomi", correct: false },
                    { text: "Kejadian yang hanya merugikan kelompok tertentu", correct: false }
                ]
            },
            { //7
                question: "Apa yang dimaksud dengan ketidaksetaraan sosial?",
                answers: [
                    { text: "Kesetaraan dalam distribusi sumber daya", correct: false },
                    { text: "Ketidaksetaraan dalam kekayaan dan akses ke sumber daya", correct: true },
                    { text: "Ketidaksetaraan dalam kebahagiaan", correct: false },
                    { text: "Kesetaraan dalam peluang", correct: false }
                ]
            },
            { //8
                question: "Faktor apa yang dapat menyebabkan konflik sosial?",
                answers: [
                    { text: "Kesetaraan dan keadilan", correct: false },
                    { text: "Ketidaksetaraan, ketidakadilan, dan persaingan berlebihan", correct: true },
                    { text: "Komunikasi yang baik", correct: false },
                    { text: "Keterbukaan dan toleransi", correct: false }
                ]
            },
            { //9
                question: "Apa yang dapat menjadi dampak dari kemiskinan terhadap masyarakat?",
                answers: [
                    { text: "Penurunan tingkat kejahatan", correct: false },
                    { text: "Penurunan kesehatan dan pendidikan", correct: true },
                    { text: "Peningkatan kesejahteraan", correct: false },
                    { text: "Keseimbangan ekonomi", correct: false }
                ]
            },
            { //10
                question: "Bagaimana masyarakat dapat berkontribusi dalam penanggulangan bencana sosial?",
                answers: [
                    { text: "Dengan meningkatkan ketidaksetaraan", correct: false },
                    { text: "Dengan mengabaikan masalah sosial", correct: true },
                    { text: "Dengan mengabaikan masalah sosial", correct: false },
                    { text: "Dengan menambah intensitas konflik sosial", correct: false }
                ]
            },
            { //11
                question: "Apa yang dimaksud dengan radikalisasi?",
                answers: [
                    { text: "Perubahan tajam", correct: false },
                    { text: "Proses menjadi radikal dan ekstrem", correct: true },
                    { text: "Perubahan positif dalam masyarakat", correct: false },
                    { text: "Toleransi terhadap perbedaan", correct: false }
                ]
            },
            { //12
                question: "Apa yang dimaksud dengan mitigasi dalam konteks penanggulangan bencana sosial?",
                answers: [
                    { text: "Peningkatan konflik sosial", correct: false },
                    { text: "Tindakan untuk mengurangi risiko dan dampak bencana", correct: true },
                    { text: "Meningkatkan intensitas bencana", correct: false },
                    { text: "Memperkuat ketidaksetaraan", correct: false }
                ]
            },
            { //13
                question: "Apa peran komunitas dalam penanggulangan bencana sosial?",
                answers: [
                    { text: "Menjaga ketidaksetaraan", correct: false },
                    { text: "Menyediakan bantuan dan dukungan sosial", correct: true },
                    { text: "Meningkatkan konflik sosial", correct: false },
                    { text: "Mengabaikan masalah sosial", correct: false }
                ]
            },
            { //14
                question: "Tindakan apa yang dapat diambil untuk mencegah ketidaksetaraan dalam masyarakat?",
                answers: [
                    { text: "Meningkatkan konflik sosial", correct: false },
                    { text: "Menerapkan kebijakan yang mendukung kesetaraan", correct: true },
                    { text: "Mempertahankan status quo", correct: false },
                    { text: "Mengabaikan hak asasi manusia", correct: false }
                ]
            },
            { //15
                question: "Bagaimana peran pemerintah dalam menanggulangi kemiskinan?",
                answers: [
                    { text: "Memperburuk situasi kemiskinan", correct: false },
                    { text: "Menyediakan program bantuan sosial dan pembangunan ekonomi", correct: true },
                    { text: "Meningkatkan ketidaksetaraan", correct: false },
                    { text: "Mengabaikan masalah kemiskinan", correct: false }
                ]
            },
            { //16
                question: "Apa yang dimaksud dengan inklusi sosial?",
                answers: [
                    { text: "Meningkatkan segregasi masyarakat", correct: false },
                    { text: "Mempromosikan keberagaman dan partisipasi semua individu dalam masyarakat", correct: true },
                    { text: "Mempromosikan keberagaman dan partisipasi semua individu dalam masyarakat", correct: false },
                    { text: "Memperkuat konflik sosial", correct: false }
                ]
            },
            { //17
                question: "Apa peran lembaga non-pemerintah (LSM) dalam penanggulangan bencana sosial?",
                answers: [
                    { text: "Meningkatkan konflik sosial", correct: false },
                    { text: "Memberikan bantuan, advokasi, dan pendampingan sosial", correct: true },
                    { text: "Menjaga ketidaksetaraan", correct: false },
                    { text: "Mengabaikan masalah sosial", correct: false }
                ]
            },
            { //18
                question: "Bagaimana partisipasi masyarakat dapat membantu dalam penanggulangan bencana sosial?",
                answers: [
                    { text: "Meningkatkan segregasi masyarakat", correct: false },
                    { text: "Memberikan informasi lokal, sumber daya, dan dukungan sosial", correct: true },
                    { text: "Meningkatkan konflik sosial", correct: false },
                    { text: "Membuat kebijakan yang tidak mendukung kesetaraan", correct: false }
                ]
            },
            { //19
                question: "Apa yang dapat dilakukan untuk mengatasi polarisasi sosial dalam masyarakat?",
                answers: [
                    { text: "Meningkatkan konflik sosial", correct: false },
                    { text: "Meningkatkan dialog antar kelompok", correct: true },
                    { text: "Memperkuat ketidaksetaraan", correct: false },
                    { text: "Menjaga keberagaman budaya", correct: false }
                ]
            },
            { //20
                question: "Bagaimana teknologi informasi dapat digunakan untuk penanggulangan bencana sosial?",
                answers: [
                    { text: "Memperkuat ketidaksetaraan", correct: false },
                    { text: "Memberikan informasi cepat dan mendukung koordinasi bantuan", correct: true },
                    { text: "Meningkatkan intensitas bencana", correct: false },
                    { text: "Meningkatkan konflik sosial", correct: false }
                ]
            },
            // Tambahkan soal dan jawaban lainnya sesuai kebutuhan
        ];

        function startQuiz() {
            playerName = document.getElementById("inputName").value;
            if (playerName.trim() === "") {
                alert("Masukkan nama Anda terlebih dahulu.");
                return;
            }

            var shuffledQuestions = shuffle(questions);
            showQuestion(shuffledQuestions[currentQuestionIndex]);

            document.getElementById("name-input").style.display = "none";
            document.getElementById("quiz").style.display = "block";
            document.getElementById("exitBtn").style.display = "block";
        }

        function shuffle(array) {
            return array.sort(() => Math.random() - 0.5);
        }

        function showQuestion(question) {
            var quizContainer = document.getElementById("quiz");
            quizContainer.innerHTML = "";

            var questionElement = document.createElement("div");
            questionElement.className = "mb-3";
            questionElement.innerText = question.question;
            quizContainer.appendChild(questionElement);

            var shuffledAnswers = shuffle(question.answers);

            shuffledAnswers.forEach(function (answer) {
                var button = document.createElement("button");
                button.innerText = answer.text;
                button.className = "btn btn-primary btn-answer";
                button.addEventListener("click", function () {
                    selectAnswer(answer, shuffledAnswers);
                });
                quizContainer.appendChild(button);
            });
        }

        function selectAnswer(selectedAnswer, shuffledAnswers) {
            if (selectedAnswer.correct) {
                score++;
            }

            currentQuestionIndex++;
            if (currentQuestionIndex < questions.length) {
                showQuestion(questions[currentQuestionIndex]);
            } else {
                endQuiz();
            }
        }

        function endQuiz() {
            var quizContainer = document.getElementById("quiz");
            quizContainer.innerHTML = "";

            var resultsContainer = document.getElementById("results");
            resultsContainer.innerHTML = "<h2 class='text-center m'>Hasil Kuis</h2>";
            resultsContainer.innerHTML += "<h2 style='text-transform: capitalize'>Nama: " + playerName + "</h2>";
            resultsContainer.innerHTML += "<h2>Skor Anda: <strong> " + score + "/" + questions.length + "</strong> </h2>";
        }

        function exitQuiz() {
            var confirmExit = confirm("Apakah Anda yakin ingin keluar dari kuis?");
            if (confirmExit) {
                window.location.href = "../quiz.php";
            }
        }
    </script>

</body>

</html>
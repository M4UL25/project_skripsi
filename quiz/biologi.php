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
                <h2 class="mb-4">Quiz Biologi</h2>
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
                question: "Yang termasuk bencana biologi?",
                answers: [
                    { text: "Konflik", correct: false },
                    { text: "Gempa", correct: false },
                    { text: "Tsunami", correct: false },
                    { text: "Wabah", correct: true }
                ]
            },
            { //2
                question: "Apa yang dimaksud dengan bencana biologi?",
                answers: [
                    { text: "Bencana yang disebabkan oleh kegiatan manusia", correct: false },
                    { text: "Bencana yang melibatkan kehidupan biologis dan lingkungannya", correct: true },
                    { text: "Bencana yang hanya terjadi di laboratorium", correct: false },
                    { text: "Bencana yang disebabkan oleh perubahan iklim", correct: false }
                ]
            },
            { //3
                question: "Virus yang menyebabkan penyakit COVID-19 disebut dengan nama apa?",
                answers: [
                    { text: "Ebola", correct: false },
                    { text: "SARS-CoV-2", correct: true },
                    { text: "Influenza", correct: false },
                    { text: "HIV", correct: false }
                ]
            },
            { //4
                question: "Apa yang dapat dilakukan untuk mencegah penyebaran penyakit infeksi seperti influenza?",
                answers: [
                    { text: "Menjauhi vaksinasi", correct: false },
                    { text: "Menerapkan isolasi sosial dan mencuci tangan secara teratur", correct: true },
                    { text: "Mengabaikan kebersihan tangan", correct: false },
                    { text: "Memperbanyak kontak dengan orang yang sakit", correct: false }
                ]
            },
            { //5
                question: "Apakah fungsi vaksin dalam penanggulangan bencana biologi?",
                answers: [
                    { text: "Menciptakan resistensi terhadap antibiotik", correct: false },
                    { text: "Membangun kekebalan tubuh terhadap penyakit tertentu", correct: true },
                    { text: "Menghancurkan mikroba di dalam tubuh", correct: false },
                    { text: "Menyebabkan penyebaran penyakit lebih cepat", correct: false }
                ]
            },
            { //6
                question: "Apa yang dimaksud dengan zoonosis?",
                answers: [
                    { text: "Penyakit yang hanya menyerang hewan", correct: false },
                    { text: "Penyakit yang dapat ditularkan dari hewan ke manusia", correct: true },
                    { text: "Penyakit yang menyebar melalui udara", correct: false },
                    { text: "Penyakit yang hanya menyerang manusia", correct: false }
                ]
            },
            { //7
                question: "Apa tindakan yang tepat dalam penanggulangan wabah penyakit?",
                answers: [
                    { text: "Menyembunyikan informasi", correct: false },
                    { text: "Menerapkan karantina dan isolasi", correct: true },
                    { text: "Mengabaikan petunjuk kesehatan", correct: false },
                    { text: "Meningkatkan mobilitas penduduk", correct: false }
                ]
            },
            { //8
                question: "Mengapa resistensi antibiotik menjadi ancaman serius?",
                answers: [
                    { text: "Karena antibiotik tidak efektif melawan bakteri", correct: false },
                    { text: "Karena bakteri dapat menjadi kebal terhadap efek antibiotik", correct: true },
                    { text: "Karena antibiotik hanya dapat digunakan pada manusia", correct: false },
                    { text: "Karena antibiotik hanya tersedia di rumah sakit", correct: false }
                ]
            },
            { //9
                question: "Apa yang dapat dilakukan untuk meminimalkan risiko penularan penyakit di tempat umum?",
                answers: [
                    { text: "Menjauhi kebersihan tangan", correct: false },
                    { text: "Menggunakan masker dan menjaga jarak fisik", correct: true },
                    { text: "Memperbanyak kontak fisik dengan orang lain", correct: false },
                    { text: "Mengabaikan petunjuk kesehatan", correct: false }
                ]
            },
            { //10
                question: "Bagaimana peran edukasi masyarakat dalam penanggulangan bencana biologi?",
                answers: [
                    { text: "Meningkatkan risiko penularan penyakit", correct: false },
                    { text: "Meningkatkan pemahaman dan kesadaran untuk pencegahan", correct: true },
                    { text: "Meningkatkan kepanikan masyarakat", correct: false },
                    { text: "Mengabaikan informasi kesehatan", correct: false }
                ]
            },
            { //11
                question: "Apa yang dimaksud dengan bencana biologi?",
                answers: [
                    { text: "Kejadian alam yang merugikan lingkungan", correct: false },
                    { text: "Kejadian yang melibatkan ancaman terhadap kehidupan manusia dan lingkungan oleh organisme biologis", correct: true },
                    { text: "Kejadian yang hanya terjadi di laboratorium", correct: false },
                    { text: "Kejadian yang disebabkan oleh perubahan iklim", correct: false }
                ]
            },
            { //12
                question: "Apa yang dapat dilakukan untuk memitigasi dampak wabah penyakit?",
                answers: [
                    { text: "Mengabaikan petunjuk kesehatan", correct: false },
                    { text: "Menerapkan karantina dan isolasi", correct: true },
                    { text: "Meningkatkan mobilitas penduduk", correct: false },
                    { text: "Memperbanyak kontak fisik dengan orang lain", correct: false }
                ]
            },
            { //13
                question: "Apa peran vaksin dalam penanggulangan bencana biologi?",
                answers: [
                    { text: "Menghancurkan mikroba di dalam tubuh", correct: false },
                    { text: "Membangun kekebalan tubuh terhadap penyakit tertentu", correct: true },
                    { text: "Menyebabkan penyebaran penyakit lebih cepat", correct: false },
                    { text: "Memperkuat ketidaksetaraan", correct: false }
                ]
            },
            { //14
                question: "Bagaimana cara meminimalkan penyebaran penyakit infeksi di tempat umum?",
                answers: [
                    { text: "Memperbanyak kontak fisik dengan orang lain", correct: false },
                    { text: "Menggunakan masker dan menjaga jarak fisik", correct: true },
                    { text: "Mengabaikan kebersihan tangan", correct: false },
                    { text: "Menyembunyikan informasi", correct: false }
                ]
            },
            { //15
                question: "Apa yang dapat dilakukan oleh masyarakat dalam menghadapi ancaman wabah penyakit?",
                answers: [
                    { text: "Mengabaikan petunjuk kesehatan", correct: false },
                    { text: "Mengikuti pedoman kesehatan dan mendukung upaya pencegahan", correct: true },
                    { text: "Menjaga ketidaksetaraan", correct: false },
                    { text: "Meningkatkan isolasi sosial", correct: false }
                ]
            },
            { //16
                question: "Mengapa penting memiliki sistem deteksi dini untuk wabah penyakit?",
                answers: [
                    { text: "Agar dapat menunda respons pencegahan", correct: false },
                    { text: "Untuk memberikan informasi yang akurat dan cepat", correct: true },
                    { text: "Agar dapat memperbanyak kontak fisik dengan orang lain", correct: false },
                    { text: "Mengabaikan risiko penularan penyakit", correct: false }
                ]
            },
            { //17
                question: "Apa dampak dari penolakan vaksin dalam upaya penanggulangan bencana biologi?",
                answers: [
                    { text: "Mempercepat penyebaran penyakit", correct: false },
                    { text: "Menghambat upaya membangun kekebalan kelompok", correct: true },
                    { text: "Meningkatkan resistensi antibiotik", correct: false },
                    { text: "Menghancurkan mikroba di dalam tubuh", correct: false }
                ]
            },
            { //18
                question: "Apa yang dapat dilakukan oleh pemerintah untuk meningkatkan kapasitas tanggap darurat terhadap wabah penyakit?",
                answers: [
                    { text: "Mengabaikan risiko penularan penyakit", correct: false },
                    { text: "Menerapkan sistem deteksi dini yang efektif", correct: true },
                    { text: "Meningkatkan ketidaksetaraan dalam masyarakat", correct: false },
                    { text: "Memperbanyak kontak fisik dengan orang lain", correct: false }
                ]
            },
            { //19
                question: "Apa yang dimaksud dengan isolasi sosial dalam konteks penanggulangan wabah penyakit?",
                answers: [
                    { text: "Mengumpulkan orang banyak dalam satu tempat", correct: false },
                    { text: "Memisahkan individu yang terinfeksi atau berisiko tinggi dari yang lain", correct: true },
                    { text: "Meningkatkan kontak fisik dengan orang lain", correct: false },
                    { text: "Mengabaikan pedoman kesehatan", correct: false }
                ]
            },
            { //20
                question: "Bagaimana peran edukasi masyarakat dalam penanggulangan bencana biologi?",
                answers: [
                    { text: "Mengabaikan informasi kesehatan", correct: false },
                    { text: "Meningkatkan pemahaman dan kesadaran untuk pencegahan", correct: true },
                    { text: "Meningkatkan kepanikan masyarakat", correct: false },
                    { text: "Menyembunyikan informasi", correct: false }
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
            resultsContainer.innerHTML += "<h2>Nilai: <strong>" + score * 5 + "</strong> </h2>";
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
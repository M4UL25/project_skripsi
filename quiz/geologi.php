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
                <h2 class="mb-4">Quiz Geologi</h2>
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
                question: "Yang termasuk bencana geologi?",
                answers: [
                    { text: "Konflik", correct: false },
                    { text: "Gempa", correct: true },
                    { text: "Tsunami", correct: false },
                    { text: "Wabah", correct: false }
                ]
            },
            { //2
                question: "Faktor penyebab wilayah Indoensia sering dilanda gempa adalah...",
                answers: [
                    { text: "Hutan di Indonesia sudah gundul", correct: false },
                    { text: "Tempat bertemunya tiga lempeng litosfer", correct: true },
                    { text: "Dilalui dua pegunungan lipatan muda", correct: false },
                    { text: "Terletak diantara dua samudera", correct: false }
                ]
            },
            { //3
                question: "Beberapa pulau di Indonesia tercatat sebagai pulau yang rawan gempa lantaran akrab dengan sentra gempa. Namun ada pula pulau yang cukup kondusif lantaran jauh dari sentra gempa. Salah satu pulau di Indonesia yang jauh dari sentra gempa adalah...",
                answers: [
                    { text: "Jawa", correct: false },
                    { text: "Kalimantan", correct: true },
                    { text: "Sulawesi", correct: false },
                    { text: "Sumatera", correct: false }
                ]
            },
            { //4
                question: "Gempa bumi yang terjadi karena aktivitas meletusnya gunung berapi adalah..",
                answers: [
                    { text: "Tektonik", correct: false },
                    { text: "Vulkanik", correct: true },
                    { text: "Tumbukan", correct: false },
                    { text: "Runtuhan", correct: false }
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
                question: "Apa yang dimaksud dengan tanah longsor",
                answers: [
                    { text: "Gerakan tanah secara vertikal", correct: false },
                    { text: "Gerakan tanah secara horizontal", correct: true },
                    { text: "Gerakan tanah secara diagonal", correct: false },
                    { text: "Gerakan tanah secara spiral", correct: false }
                ]
            },
            { //7
                question: "Faktor apa yang dapat menyebabkan terjadinya tanah longsor?",
                answers: [
                    { text: "Pemanasan global dan perubahan iklim", correct: false },
                    { text: "Curah hujan tinggi, erosi, dan kegiatan manusia", correct: true },
                    { text: "Aktivitas gunung berapi", correct: false },
                    { text: "Semua jawaban benar", correct: false }
                ]
            },
            { //8
                question: "Jenis tanah manakah yang cenderung lebih rentan terhadap tanah longsor?",
                answers: [
                    { text: "Tanah pasir", correct: false },
                    { text: "Tanah liat", correct: true },
                    { text: "Tanah berpasir", correct: false },
                    { text: "Tanah berbatu", correct: false }
                ]
            },
            { //9
                question: "Apa yang dimaksud dengan tanah longsor translasional?",
                answers: [
                    { text: "Tanah bergerak secara vertikal", correct: false },
                    { text: "Tanah bergerak secara horizontal", correct: true },
                    { text: "Tanah bergerak dalam bentuk gelombang", correct: false },
                    { text: "Tanah bergerak spiral ke atas", correct: false }
                ]
            },
            { //10
                question: "Mengapa tanah liat cenderung lebih rentan terhadap tanah longsor dibandingkan dengan tanah pasir?",
                answers: [
                    { text: "Tanah liat kurang sensitif terhadap air", correct: false },
                    { text: "Tanah liat memiliki struktur yang lebih padat", correct: true },
                    { text: "Tanah liat memiliki kemampuan drainase yang baik", correct: false },
                    { text: "Tanah liat lebih stabil secara alami", correct: false }
                ]
            },
            { //11
                question: "Apa peran vegetasi dalam mencegah tanah longsor?",
                answers: [
                    { text: "Vegetasi dapat meningkatkan erosi tanah", correct: false },
                    { text: "Vegetasi dapat mengurangi kecepatan aliran air dan memperkuat tanah", correct: true },
                    { text: "Akar tumbuhan dapat menyebabkan kerusakan pada tanah", correct: false },
                    { text: "Vegetasi tidak memiliki pengaruh signifikan terhadap tanah longsor", correct: false }
                ]
            },
            { //12
                question: "Apa yang menyebabkan terjadinya gempa bumi?",
                answers: [
                    { text: "Pemanasan global", correct: false },
                    { text: "Pergerakan lempeng bumi", correct: true },
                    { text: "Aktivitas vulkanik", correct: false },
                    { text: "Gelombang radioaktif", correct: false }
                ]
            },
            { //13
                question: "Alat apa yang digunakan untuk mengukur kekuatan gempa bumi?",
                answers: [
                    { text: "Barometer", correct: false },
                    { text: "Seismograf", correct: true },
                    { text: "Termometer", correct: false },
                    { text: "Kompas", correct: false }
                ]
            },
            { //14
                question: "Skala Richter digunakan untuk mengukur apa pada gempa bumi?",
                answers: [
                    { text: "Kedalaman pusat gempa", correct: false },
                    { text: "Magnitudo gempa", correct: true },
                    { text: "Durasi gempa", correct: false },
                    { text: "Intensitas gempa", correct: false }
                ]
            },
            { //15
                question: "Langkah apa yang dapat diambil untuk meningkatkan keselamatan selama gempa bumi?",
                answers: [
                    { text: "Mengabaikan peringatan dini", correct: false },
                    { text: "Menjauhi jendela dan benda berat yang bisa jatuh", correct: true },
                    { text: "Berlindung di bawah struktur yang rapuh", correct: false },
                    { text: "Berlari keluar dari bangunan segera setelah gempa terjadi", correct: false }
                ]
            },
            { //16
                question: "Apa yang dimaksud dengan 'Drop, Cover, and Hold On' dalam protokol tanggap gempa?",
                answers: [
                    { text: "Melempar barang-barang di sekitar", correct: false },
                    { text: "Berlindung di bawah meja atau tempat yang aman, dan menahan diri", correct: true },
                    { text: "Mengabaikan situasi dan melanjutkan kegiatan seperti biasa", correct: false },
                    { text: "Mencari tempat yang tinggi saat gempa terjadi", correct: false }
                ]
            },
            { //17
                question: "Mengapa penting memiliki rencana evakuasi dan tempat kumpul keluarga selama gempa?",
                answers: [
                    { text: "Untuk menghindari guncangan gempa", correct: false },
                    { text: "Memudahkan komunikasi dan pertemuan keluarga setelah gempa", correct: true },
                    { text: "Agar dapat segera pulang setelah gempa berakhir", correct: false },
                    { text: "Rencana evakuasi tidak diperlukan", correct: false }
                ]
            },
            { //18
                question: "Langkah apa yang dapat diambil untuk mencegah tanah longsor?",
                answers: [
                    { text: "Menebang semua pohon di area berisiko", correct: false },
                    { text: "Membuat teras atau tanggul", correct: true },
                    { text: "Meningkatkan curah hujan di daerah tersebut", correct: false },
                    { text: "Mempercepat aliran air di lereng", correct: false }
                ]
            },
            { //19
                question: "Apa peran dinding penahan atau tanggul dalam pengelolaan tanah longsor?",
                answers: [
                    { text: "Mempercepat erosi tanah", correct: false },
                    { text: "Memberikan dukungan struktural dan mengurangi tekanan tanah", correct: true },
                    { text: "Membatasi aliran air", correct: false },
                    { text: "Meningkatkan risiko tanah longsor", correct: false }
                ]
            },
            { //20
                question: "Mengapa penting untuk mengidentifikasi faktor pemicu tanah longsor?",
                answers: [
                    { text: "Agar dapat meningkatkan aktivitas manusia di area tersebut", correct: false },
                    { text: "Sebagai dasar perencanaan dan penanggulangan yang efektif", correct: true },
                    { text: "Untuk menyalahkan alam atas terjadinya tanah longsor", correct: false },
                    { text: "Identifikasi tidak diperlukan dalam pengelolaan tanah longsor", correct: false }
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
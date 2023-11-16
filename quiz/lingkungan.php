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
                <h2 class="mb-4">Quiz Lingkungan</h2>
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
                question: "Yang termasuk bencana kegagalan lingkungan?",
                answers: [
                    { text: "Konflik", correct: false },
                    { text: "Gempa", correct: false },
                    { text: "Limbah", correct: true },
                    { text: "Wabah", correct: false }
                ]
            },
            { //2
                question: "Apa yang dimaksud dengan bencana lingkungan?",
                answers: [
                    { text: "Kejadian yang melibatkan ancaman terhadap kehidupan manusia", correct: false },
                    { text: "Kejadian alam yang merugikan lingkungan", correct: true },
                    { text: "Kejadian yang hanya terjadi di laboratorium", correct: false },
                    { text: "Kejadian yang disebabkan oleh perubahan iklim", correct: false }
                ]
            },
            { //3
                question: "Apa yang dapat menyebabkan bencana lingkungan?",
                answers: [
                    { text: "Hanya gejala alam", correct: false },
                    { text: "Perubahan iklim, aktivitas manusia, dan gejala alam", correct: true },
                    { text: "Peningkatan kesadaran lingkungan", correct: false },
                    { text: "Isolasi sosial", correct: false }
                ]
            },
            { //4
                question: "Contoh bencana lingkungan yang disebabkan oleh aktivitas manusia adalah...",
                answers: [
                    { text: "Gempa bumi", correct: false },
                    { text: "Kebakaran hutan", correct: true },
                    { text: "Banjir", correct: false },
                    { text: "Letusan gunung api", correct: false }
                ]
            },
            { //5 
                question: "Apa yang dapat dilakukan untuk mencegah bencana pencemaran udara?",
                answers: [
                    { text: "Meningkatkan emisi gas rumah kaca", correct: false },
                    { text: "Memperbanyak tanaman penghasil oksigen", correct: true },
                    { text: "Menggunakan bahan bakar fosil secara berlebihan", correct: false },
                    { text: "Membuang limbah kimia ke sungai", correct: false }
                ]
            },
            { //6
                question: "Bagaimana pengelolaan sampah yang baik dapat mengurangi bencana lingkungan?",
                answers: [
                    { text: "Dengan membuang sampah sembarangan", correct: false },
                    { text: "Dengan melakukan daur ulang dan pengelolaan limbah yang efektif", correct: true },
                    { text: "Dengan memindahkan sampah ke tempat tersembunyi", correct: false },
                    { text: "Dengan meningkatkan produksi sampah plastik", correct: false }
                ]
            },
            { //7
                question: "Apa yang dapat dilakukan untuk mengurangi risiko banjir?",
                answers: [
                    { text: "Menebang pohon di sepanjang sungai", correct: false },
                    { text: "Membuat saluran air yang baik", correct: true },
                    { text: "Meningkatkan urbanisasi", correct: false },
                    { text: "Meningkatkan pengeboran sumur artesis", correct: false }
                ]
            },
            { //8
                question: "Manakah dari berikut yang termasuk bencana lingkungan yang disebabkan oleh perubahan iklim?",
                answers: [
                    { text: "Kebakaran hutan", correct: false },
                    { text: "Banjir", correct: true },
                    { text: "Gempa bumi", correct: false },
                    { text: "Pencemaran air sungai", correct: false }
                ]
            },
            { //9
                question: "Apa yang dimaksud dengan deforestasi?",
                answers: [
                    { text: "Penambahan luas hutan", correct: false },
                    { text: "Pengurangan luas hutan", correct: true },
                    { text: "Peningkatan keanekaragaman hayati", correct: false },
                    { text: "Pemeliharaan keberlanjutan hutan", correct: false }
                ]
            },
            { //10
                question: "Bagaimana cara mengurangi dampak bencana lingkungan terhadap komunitas lokal?",
                answers: [
                    { text: "Meningkatkan produksi limbah", correct: false },
                    { text: "Mengembangkan rencana penanggulangan bencana", correct: true },
                    { text: "Mempercepat deforestasi", correct: false },
                    { text: "Meningkatkan penggunaan bahan bakar fosil", correct: false }
                ]
            },
            { //11
                question: "Apa yang dimaksud dengan penanggulangan bencana lingkungan?",
                answers: [
                    { text: "Tindakan untuk menciptakan bencana lingkungan", correct: false },
                    { text: "Tindakan pencegahan dan penanganan untuk mengurangi risiko dan dampak bencana lingkungan", correct: true },
                    { text: "Penyebab langsung bencana lingkungan", correct: false },
                    { text: "Tindakan untuk meningkatkan risiko bencana", correct: false }
                ]
            },
            { //12
                question: "Apa yang dapat dilakukan untuk mencegah deforestasi?",
                answers: [
                    { text: "Menebang pohon tanpa batas", correct: false },
                    { text: "Melakukan reboisasi dan pengelolaan hutan yang berkelanjutan", correct: true },
                    { text: "Meningkatkan produksi kayu", correct: false },
                    { text: "Meningkatkan pembakaran hutan", correct: false }
                ]
            },
            { //13
                question: "Manakah tindakan yang tepat dalam penanggulangan bencana pencemaran udara?",
                answers: [
                    { text: "Meningkatkan emisi gas rumah kaca", correct: false },
                    { text: "Menerapkan kontrol emisi dan menggencarkan kampanye untuk penggunaan energi bersih", correct: true },
                    { text: "Mengabaikan aturan emisi industri", correct: false },
                    { text: "Meningkatkan konsumsi bahan bakar fosil", correct: false }
                ]
            },
            { //14
                question: "Apa dampak positif dari pengelolaan sampah yang baik terhadap lingkungan?",
                answers: [
                    { text: "Peningkatan pencemaran tanah", correct: false },
                    { text: "Pengurangan risiko banjir", correct: true },
                    { text: "Peningkatan emisi gas rumah kaca", correct: false },
                    { text: "Meningkatkan risiko bencana", correct: false }
                ]
            },
            { //15
                question: "Bagaimana komunitas lokal dapat berkontribusi dalam penanggulangan bencana lingkungan?",
                answers: [
                    { text: "Meningkatkan produksi limbah", correct: false },
                    { text: "Meningkatkan partisipasi dalam program daur ulang dan membersihkan lingkungan", correct: true },
                    { text: "Melakukan pembalakan hutan secara berlebihan", correct: false },
                    { text: "Mengabaikan petunjuk penanggulangan bencana", correct: false }
                ]
            },
            { //16
                question: "Apa yang dapat dilakukan untuk mengurangi dampak banjir?",
                answers: [
                    { text: "Meningkatkan penggunaan bahan bakar fosil", correct: false },
                    { text: "Membangun tanggul di sepanjang sungai", correct: true },
                    { text: "Meningkatkan penggundulan hutan", correct: false },
                    { text: "Meningkatkan pengeboran sumur artesis", correct: false }
                ]
            },
            { //17
                question: "Bagaimana teknologi dapat digunakan dalam penanggulangan bencana lingkungan?",
                answers: [
                    { text: "Meningkatkan penggunaan bahan kimia berbahaya", correct: false },
                    { text: "Memberikan informasi cepat melalui sistem pemantauan dan peringatan dini", correct: true },
                    { text: "Mempercepat urbanisasi", correct: false },
                    { text: "Mengabaikan risiko perubahan iklim", correct: false }
                ]
            },
            { //18
                question: "Apa yang dapat dilakukan untuk meningkatkan kesadaran masyarakat tentang penanggulangan bencana lingkungan?",
                answers: [
                    { text: "Mengabaikan kampanye lingkungan", correct: false },
                    { text: "Melibatkan masyarakat dalam edukasi, pelatihan, dan simulasi bencana", correct: true },
                    { text: "Meningkatkan pembakaran sampah", correct: false },
                    { text: "Mempercepat urbanisasi", correct: false }
                ]
            },
            { //19
                question: "Apakah pentingnya menciptakan kebijakan lingkungan yang berkelanjutan dalam penanggulangan bencana?",
                answers: [
                    { text: "Tidak penting, karena kebijakan hanya menambah birokrasi", correct: false },
                    { text: "Sangat penting untuk memberikan panduan dan perlindungan terhadap lingkungan", correct: true },
                    { text: "Tidak penting, karena kebijakan tidak berpengaruh pada kelestarian lingkungan", correct: false },
                    { text: "Cukup penting, tetapi tidak membutuhkan tindakan konkrit", correct: false }
                ]
            },
            { //20
                question: "Apa yang dapat dilakukan oleh pemerintah untuk meningkatkan resiliensi komunitas terhadap bencana lingkungan?",
                answers: [
                    { text: "Mengurangi alokasi anggaran untuk penanggulangan bencana", correct: false },
                    { text: "Meningkatkan partisipasi masyarakat dalam riset ilmiah", correct: true },
                    { text: "Mengabaikan peningkatan risiko bencana", correct: false },
                    { text: "Memperbanyak pembangunan di daerah rawan bencana", correct: false }
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
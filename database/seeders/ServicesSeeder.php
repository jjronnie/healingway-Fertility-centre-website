<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Comprehensive Fertility Assessment',
                'icon' => 'stethoscope',
                'desc' => 'A complete medical evaluation to identify fertility challenges and guide the best treatment options.',
                'body' => '
                    <h2>Comprehensive Fertility Assessment</h2>
                    <p>
                        Our fertility assessment is the first and most critical step in understanding your reproductive health.
                        It provides a clear picture of potential challenges and helps us recommend the most effective treatment plan.
                    </p>

                    <h3>What the assessment includes</h3>
                    <ul>
                        <li>Detailed medical and reproductive history review</li>
                        <li>Hormonal blood tests</li>
                        <li>Ultrasound scans for ovarian and uterine health</li>
                        <li>Semen analysis for male partners</li>
                        <li>Personalized fertility counseling</li>
                    </ul>

                    <p>
                        Early diagnosis saves time, emotional stress, and cost. Our specialists ensure a confidential,
                        accurate, and compassionate assessment process.
                    </p>
                ',
            ],
            [
                'name' => 'In Vitro Fertilization (IVF)',
                'icon' => 'test-tube',
                'desc' => 'Advanced assisted reproduction where eggs and sperm are fertilized in a laboratory setting.',
                'body' => '
                    <h2>In Vitro Fertilization (IVF)</h2>
                    <p>
                        IVF is one of the most effective fertility treatments available today.
                        It involves fertilizing an egg with sperm outside the body and transferring the embryo into the uterus.
                    </p>

                    <h3>IVF process</h3>
                    <ol>
                        <li>Ovarian stimulation to produce multiple eggs</li>
                        <li>Egg retrieval under guided ultrasound</li>
                        <li>Laboratory fertilization</li>
                        <li>Embryo development and monitoring</li>
                        <li>Embryo transfer</li>
                    </ol>

                    <p>
                        IVF is recommended for blocked tubes, severe male infertility, unexplained infertility,
                        or when other treatments have failed.
                    </p>
                ',
            ],
            [
                'name' => 'Intracytoplasmic Sperm Injection (ICSI)',
                'icon' => 'microscope',
                'desc' => 'A specialized IVF technique where a single sperm is injected directly into an egg.',
                'body' => '
                    <h2>Intracytoplasmic Sperm Injection (ICSI)</h2>
                    <p>
                        ICSI is an advanced form of IVF designed for severe male infertility cases.
                        It significantly increases fertilization success when sperm quality is low.
                    </p>

                    <h3>When ICSI is recommended</h3>
                    <ul>
                        <li>Low sperm count or motility</li>
                        <li>Abnormal sperm morphology</li>
                        <li>Previous IVF fertilization failure</li>
                        <li>Use of frozen or surgically retrieved sperm</li>
                    </ul>

                    <p>
                        Our embryology lab follows strict quality and safety standards to maximize success rates.
                    </p>
                ',
            ],
            [
                'name' => 'Egg Freezing (Oocyte Cryopreservation)',
                'icon' => 'snowflake',
                'desc' => 'Preserve your fertility by freezing healthy eggs for future use.',
                'body' => '
                    <h2>Egg Freezing</h2>
                    <p>
                        Egg freezing allows women to preserve their fertility for medical, personal, or career reasons.
                        Eggs are retrieved, frozen, and stored safely for future use.
                    </p>

                    <h3>Who should consider egg freezing</h3>
                    <ul>
                        <li>Women delaying pregnancy</li>
                        <li>Cancer patients before treatment</li>
                        <li>Those with declining ovarian reserve</li>
                    </ul>

                    <p>
                        Frozen eggs maintain their quality and can be used later through IVF when you are ready.
                    </p>
                ',
            ],
            [
                'name' => 'Embryo Freezing (Cryopreservation)',
                'icon' => 'archive',
                'desc' => 'Safely store embryos for future pregnancy attempts.',
                'body' => '
                    <h2>Embryo Freezing</h2>
                    <p>
                        Embryo cryopreservation allows extra embryos from IVF cycles to be preserved for future use.
                        This improves cumulative pregnancy success rates.
                    </p>

                    <h3>Benefits</h3>
                    <ul>
                        <li>Reduces need for repeated ovarian stimulation</li>
                        <li>Allows planned future pregnancies</li>
                        <li>Cost effective long term</li>
                    </ul>

                    <p>
                        Embryos are stored using advanced vitrification techniques to ensure maximum survival.
                    </p>
                ',
            ],
            [
                'name' => 'Sperm Freezing and Storage',
                'icon' => 'database',
                'desc' => 'Preserve sperm safely for future fertility treatments.',
                'body' => '
                    <h2>Sperm Freezing and Storage</h2>
                    <p>
                        Sperm cryopreservation is a reliable option for fertility preservation in men.
                        Samples are frozen and securely stored for future reproductive use.
                    </p>

                    <h3>Common reasons</h3>
                    <ul>
                        <li>Before cancer treatment or surgery</li>
                        <li>Low sperm count diagnosis</li>
                        <li>Planned delayed parenthood</li>
                    </ul>

                    <p>
                        Stored sperm can later be used for IUI or IVF treatments.
                    </p>
                ',
            ],
            [
                'name' => 'Genetic Screening and Counseling',
                'icon' => 'dna',
                'desc' => 'Identify inherited conditions and reduce genetic risks before pregnancy.',
                'body' => '
                    <h2>Genetic Screening and Counseling</h2>
                    <p>
                        Genetic screening helps detect inherited disorders that may affect pregnancy or child health.
                        Counseling provides clarity and informed decision making.
                    </p>

                    <h3>Our services include</h3>
                    <ul>
                        <li>Carrier screening</li>
                        <li>Preimplantation genetic testing</li>
                        <li>Personalized genetic counseling</li>
                    </ul>

                    <p>
                        This service improves pregnancy outcomes and provides peace of mind to families.
                    </p>
                ',
            ],
            [
                'name' => 'Intrauterine Insemination (IUI)',
                'icon' => 'heart-pulse',
                'desc' => 'A minimally invasive fertility treatment that places sperm directly into the uterus.',
                'body' => '
                    <h2>Intrauterine Insemination (IUI)</h2>
                    <p>
                        IUI is a simple fertility procedure where prepared sperm is placed directly into the uterus
                        around the time of ovulation.
                    </p>

                    <h3>Best suited for</h3>
                    <ul>
                        <li>Mild male factor infertility</li>
                        <li>Unexplained infertility</li>
                        <li>Cervical mucus issues</li>
                    </ul>

                    <p>
                        It is affordable, safe, and often the first step before advanced treatments.
                    </p>
                ',
            ],
            [
                'name' => 'Laparoscopy and Hysteroscopy',
                'icon' => 'activity',
                'desc' => 'Minimally invasive procedures to diagnose and treat reproductive conditions.',
                'body' => '
                    <h2>Laparoscopy and Hysteroscopy</h2>
                    <p>
                        These minimally invasive surgical procedures help diagnose and correct
                        underlying fertility issues within the uterus and pelvis.
                    </p>

                    <h3>Conditions treated</h3>
                    <ul>
                        <li>Fibroids and polyps</li>
                        <li>Endometriosis</li>
                        <li>Blocked fallopian tubes</li>
                        <li>Uterine abnormalities</li>
                    </ul>

                    <p>
                        Procedures are safe, precise, and promote faster recovery times.
                    </p>
                ',
            ],
        ];

        foreach ($services as $service) {
            DB::table('services')->insert([
                'name' => $service['name'],
                'slug' => Str::slug($service['name']),
                'photo' => null,
                'icon' => $service['icon'],
                'desc' => $service['desc'],
                'body' => $service['body'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

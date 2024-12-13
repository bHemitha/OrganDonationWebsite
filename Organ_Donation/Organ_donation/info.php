<?php
include_once('helper/connection.php');
include_once('helper/header.php'); ?>
<!DOCTYPE html>
<html>

<head>
  <style>
    body {
      background-color: white;
      color: black;
    }
  </style>
  <style>
    body {
      background-color: white;
      color: black;
    }

    .tab {
      display: flex;
      flex-direction: column;
      width: 500px;
      background-color: #111;
      border-radius: 5px;
      padding: 10px;
      margin: 0 auto;
      align-items: center;
    }

    .tab button {
      border: none;
      outline: none;
      cursor: pointer;
      padding: 12px;
      transition: background-color 0.3s ease;
      text-align: left;
      background-color: #ffffff;
      color: black;
      margin-bottom: 5px;
      border-radius: 5px;
      width: 100%;
    }

    .tab button:hover {
      background-color: #777;
    }

    .tab button.active {
      background-color: #ccc;
      color: black;
    }

    .tabcontent {
      display: none;
      padding: 6px 12px;
      border: 1px solid #ccc;
      background-color: #111;
      color: white;
      width: 100%;
      margin-top: 10px;
    }
  </style>
</head>
<centre>

  <body>
    </br>
    </br>
    <div class="tab">
      <button class="tablinks" onclick="openTab(event, 'Tab1')">What is organ donation?</button>
      <button class="tablinks" onclick="openTab(event, 'Tab2')">What is the process of organ donation?</button>
      <button class="tablinks" onclick="openTab(event, 'Tab3')">Organ allocation process in India</button>
      <button class="tablinks" onclick="openTab(event, 'Tab4')">What potential organ receipients need to know</button>
      <button class="tablinks" onclick="openTab(event, 'Tab5')">How long can an organ survive
        inside and outside the body in a deceased organ donation?</button>
      <button class="tablinks" onclick="openTab(event, 'Tab6')">Frequently asked questions</button>


    </div>

    <div id="Tab1" class="tabcontent">
      <h3>What is organ donatin?</h3>
      <p>Organ donation is the generous act of giving one's organs or tissues to someone in need of a transplant. It
        involves providing a healthy organ, such as a kidney, liver, heart, lungs, pancreas, or intestines, to replace a
        failing or damaged organ in another person's body. Organ transplantation is a life-saving procedure that can
        significantly improve the quality of life or even save the lives of patients suffering from organ failure or
        certain medical conditions. Organ donations can come from living donors, who can donate organs like kidneys, or
        from deceased donors, who can donate organs like the heart, liver, and lungs. Organ donation offers hope and a
        new lease on life to individuals in need, and it relies on the generosity and compassion of donors and their
        families.</p>
    </div>

    <div id="Tab2" class="tabcontent">
      <h3>What is the process of organ donation?</h3>
      <p>For Living Organ Donors:

        Evaluation: The potential living donor undergoes a thorough medical evaluation to assess their overall health
        and compatibility as a donor. This includes physical exams, medical tests, and consultations with healthcare
        professionals.

        Donor Selection: Based on the evaluation, the medical team determines if the individual is a suitable candidate
        for organ donation. Factors considered include compatibility with the recipient, the donor's willingness, and
        the potential risks and benefits.

        Informed Consent: The living donor receives detailed information about the donation process, risks, benefits,
        and long-term implications. They have the opportunity to ask questions and make an informed decision. If they
        consent, the process proceeds.

        Surgical Procedure: The donor undergoes surgery to remove the organ or tissue being donated. The medical team
        ensures the donor's safety and comfort throughout the procedure. Post-surgery, the donor receives appropriate
        care and support for a smooth recovery.

        For Deceased Organ Donors:

        Identification and Consent: When an individual is declared brain dead or dies under specific circumstances,
        their suitability for organ donation is determined. Medical professionals communicate with the family to obtain
        consent for organ donation, respecting the wishes of the deceased if they had expressed them.

        Medical Evaluation: The donor's medical history is assessed, and various tests are conducted to determine the
        condition and suitability of the organs for transplantation. This evaluation aims to ensure recipient safety and
        maximize the success of the transplants.

        Organ Recovery: If the organs are deemed suitable for transplantation, a surgical team retrieves them from the
        deceased donor. The procedure is performed with the utmost respect and care for the donor's body.

        Organ Allocation and Transplantation: Organ procurement organizations work with transplant centers to match
        available organs with suitable recipients based on factors such as blood type, tissue compatibility, and medical
        urgency. The recipients undergo evaluation to confirm compatibility and readiness for transplantation. The
        organs are then transplanted into the recipients through surgical procedures.

        Follow-up and Monitoring: After the transplant, recipients receive comprehensive medical care and ongoing
        monitoring to ensure the success of the organ transplant and the well-being of the recipient. Regular check-ups
        and medication management are part of the post-transplant care process.</p>
    </div>

    <div id="Tab3" class="tabcontent">
      <h3>Organ allocation process in India</h3>
      <p>The organ allocation process in India involves several key steps. First, when an individual is declared
        brain-dead or eligible for organ donation, consent is obtained from their family or legal guardian. Organ
        Procurement Organizations (OPOs) then take charge of coordinating the donation process. They work to identify
        potential recipients based on factors such as medical urgency, blood type, tissue compatibility, and waiting
        time. These factors are used to create a waiting list managed by transplant hospitals and organizations
        throughout the country. Allocation algorithms are utilized to ensure fair distribution of organs based on these
        criteria, ensuring that those in urgent need receive priority. The process aims to provide equitable access to
        organs for patients awaiting transplantation in India.</p>
    </div>
    <div id="Tab4" class="tabcontent">
      <h3>What potential organ receipients need to know?</h3>
      <p>Potential organ recipients in India should be aware of several key aspects. Firstly, they should understand the
        importance of timely registration on the waiting list managed by transplant hospitals and organizations. It is
        crucial to provide accurate and up-to-date medical information to ensure proper evaluation and matching with
        suitable organ donors. Additionally, potential recipients should stay informed about the organ allocation
        process and the factors considered in prioritizing organ allocation, such as medical urgency, blood type, and
        tissue compatibility. It is advisable to maintain regular contact with the transplant hospital or organization
        responsible for managing the waiting list to stay updated on their status and any potential matches. Being
        proactive, informed, and patient during the process can greatly increase the chances of receiving a suitable
        organ for transplantation.</p>
    </div>
    <div id="Tab5" class="tabcontent">
      <h3>How long can an organ survive
        inside and outside the body in a deceased organ donation?</h3>
      <p>The survival time of an organ in a deceased organ donation varies depending on several factors. Once the organ
        procurement process begins, the organ's viability is dependent on how quickly it can be removed from the donor's
        body and preserved for transplantation. Generally, the heart and lungs have the shortest preservation time of
        around 4-6 hours outside the body, while the liver can survive for up to 24 hours, and the kidneys for up to 48
        hours. These times can be extended by using specialized preservation techniques and equipment such as cold
        storage, hypothermic perfusion, and machine perfusion. The timely and effective preservation of organs is
        crucial in ensuring their viability and suitability for transplantation. After transplantation, the survival and
        success of the organ transplant depend on several factors such as the recipient's immune system response, the
        quality of the organ, and the post-transplant care provided.</p>
    </div>
    <div id="Tab6" class="tabcontent">
      <h3>Frequently asked questions</h3>
      <p>1.How can I become an organ donor?<br>
        To become an organ donor, you can register your decision with the appropriate organ donor registry in your
        country or state. You can also express your wishes to your family and loved ones, as their consent may be
        required even if you are a registered donor.<br><br>

        2.What organs and tissues can be donated?<br>
        Organs that can be donated include the heart, liver, lungs, kidneys, pancreas, and small intestine. Tissues that
        can be donated include corneas, skin, bone, tendons, and heart valves.<br><br>

        3.Will organ donation affect the funeral arrangements?<br>
        No, organ donation does not significantly impact funeral arrangements. The process of organ donation is
        conducted with respect and care, ensuring that the donor's body is treated with dignity. The organs and tissues
        are recovered through surgical procedures, and the body is carefully reconstructed for an open-casket funeral,
        if desired.<br><br>

        4.Are there any costs associated with organ donation?<br>
        The organ procurement process is generally covered by the recipient's health insurance or organ procurement
        organizations. The donor's family is not responsible for any costs related to organ donation.<br><br>

        5.Can I specify who receives my donated organs?<br>
        No, organ allocation is based on medical factors such as urgency, blood type, and tissue compatibility. The
        organ allocation process is conducted impartially by the appropriate authorities to ensure fairness and maximize
        the chances of successful transplantation.<br><br>

        6.Can I donate organs if I have a medical condition or a history of illness?<br>
        Many medical conditions do not automatically disqualify someone from organ donation. The suitability for
        donation is determined on a case-by-case basis by medical professionals. Even with certain medical conditions,
        some organs or tissues may still be suitable for transplantation, while others may not.<br><br>

        7.Can I donate organs if I am older?<br>
        Age alone does not disqualify someone from organ donation. The decision for organ suitability is based on the
        overall health and condition of the organs, rather than age. Older individuals can still be considered for organ
        donation, and medical professionals will assess the organs' viability based on medical criteria.<br><br>

        8.How long does the organ transplantation process take?<br>
        The duration of the organ transplantation process varies for each recipient. It depends on factors such as the
        availability of a suitable organ match, the recipient's medical condition, and the urgency of the transplant. It
        is important to note that receiving an organ may take time, and patients are typically prioritized based on
        medical need.<br><br>

        9.Can I choose to donate only specific organs or tissues?<br>
        Yes, you can express your preference to donate specific organs or tissues. When registering as an organ donor,
        you can specify which organs or tissues you wish to donate. However, it is important to understand that the
        final decision on which organs or tissues can be donated will be made based on medical suitability at the time
        of donation.<br><br>

        10.Will my decision to be an organ donor affect my medical care?<br>
        No, your decision to be an organ donor will not affect the quality of medical care you receive. Organ donation
        and medical treatment are entirely separate processes. Medical professionals prioritize saving lives and
        providing the best possible care for patients. The organ donation process only begins after all life-saving
        efforts have been exhausted and death has been declared.<br><br></p>
    </div>




    <script>
      function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
      }
    </script>
  </body>

</html>
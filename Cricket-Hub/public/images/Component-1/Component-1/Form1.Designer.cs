namespace Component_1
{
    partial class Form1
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            btn_Run = new Button();
            btn_Clear = new Button();
            btn_Output = new PictureBox();
            btn_Cmd = new TextBox();
            btn_ConsolePnl = new TextBox();
            btn_Reset = new Button();
            textBox1 = new TextBox();
            textBox2 = new TextBox();
            textBox3 = new TextBox();
            ((System.ComponentModel.ISupportInitialize)btn_Output).BeginInit();
            SuspendLayout();
            // 
            // btn_Run
            // 
            btn_Run.Font = new Font("Segoe UI", 9F, FontStyle.Bold, GraphicsUnit.Point, 0);
            btn_Run.Location = new Point(356, 299);
            btn_Run.Name = "btn_Run";
            btn_Run.Size = new Size(94, 29);
            btn_Run.TabIndex = 0;
            btn_Run.Text = "Run";
            btn_Run.UseVisualStyleBackColor = true;
            btn_Run.Click += btn_Run_Click;
            // 
            // btn_Clear
            // 
            btn_Clear.Font = new Font("Segoe UI", 9F, FontStyle.Bold, GraphicsUnit.Point, 0);
            btn_Clear.Location = new Point(466, 299);
            btn_Clear.Name = "btn_Clear";
            btn_Clear.Size = new Size(94, 29);
            btn_Clear.TabIndex = 1;
            btn_Clear.Text = "Clear";
            btn_Clear.UseVisualStyleBackColor = true;
            btn_Clear.Click += btn_Clear_Click;
            // 
            // btn_Output
            // 
            btn_Output.BackColor = SystemColors.Window;
            btn_Output.BorderStyle = BorderStyle.Fixed3D;
            btn_Output.Location = new Point(356, 36);
            btn_Output.Name = "btn_Output";
            btn_Output.Size = new Size(446, 257);
            btn_Output.TabIndex = 2;
            btn_Output.TabStop = false;
            // 
            // btn_Cmd
            // 
            btn_Cmd.Location = new Point(3, 36);
            btn_Cmd.Multiline = true;
            btn_Cmd.Name = "btn_Cmd";
            btn_Cmd.Size = new Size(347, 257);
            btn_Cmd.TabIndex = 3;
            // 
            // btn_ConsolePnl
            // 
            btn_ConsolePnl.Location = new Point(3, 336);
            btn_ConsolePnl.Multiline = true;
            btn_ConsolePnl.Name = "btn_ConsolePnl";
            btn_ConsolePnl.Size = new Size(347, 115);
            btn_ConsolePnl.TabIndex = 4;
            // 
            // btn_Reset
            // 
            btn_Reset.Font = new Font("Segoe UI", 9F, FontStyle.Bold, GraphicsUnit.Point, 0);
            btn_Reset.Location = new Point(580, 299);
            btn_Reset.Name = "btn_Reset";
            btn_Reset.Size = new Size(94, 29);
            btn_Reset.TabIndex = 5;
            btn_Reset.Text = "Reset";
            btn_Reset.UseVisualStyleBackColor = true;
            btn_Reset.Click += btn_Reset_Click;
            // 
            // textBox1
            // 
            textBox1.Font = new Font("Segoe UI Black", 10.8F, FontStyle.Bold | FontStyle.Italic, GraphicsUnit.Point, 0);
            textBox1.Location = new Point(3, 299);
            textBox1.Name = "textBox1";
            textBox1.Size = new Size(127, 31);
            textBox1.TabIndex = 6;
            textBox1.Text = "Message Log";
            // 
            // textBox2
            // 
            textBox2.Font = new Font("Segoe UI Black", 10.8F, FontStyle.Bold | FontStyle.Italic, GraphicsUnit.Point, 0);
            textBox2.Location = new Point(3, -1);
            textBox2.Name = "textBox2";
            textBox2.Size = new Size(152, 31);
            textBox2.TabIndex = 7;
            textBox2.Text = "Command Input";
            // 
            // textBox3
            // 
            textBox3.Font = new Font("Segoe UI Black", 10.8F, FontStyle.Bold | FontStyle.Italic, GraphicsUnit.Point, 0);
            textBox3.Location = new Point(356, -1);
            textBox3.Name = "textBox3";
            textBox3.Size = new Size(159, 31);
            textBox3.TabIndex = 8;
            textBox3.Text = "Command Result";
            // 
            // Form1
            // 
            AutoScaleDimensions = new SizeF(8F, 20F);
            AutoScaleMode = AutoScaleMode.Font;
            ClientSize = new Size(800, 450);
            Controls.Add(textBox3);
            Controls.Add(textBox2);
            Controls.Add(textBox1);
            Controls.Add(btn_Reset);
            Controls.Add(btn_ConsolePnl);
            Controls.Add(btn_Cmd);
            Controls.Add(btn_Output);
            Controls.Add(btn_Clear);
            Controls.Add(btn_Run);
            Font = new Font("Segoe UI", 9F);
            Name = "Form1";
            Text = "Form1";
            ((System.ComponentModel.ISupportInitialize)btn_Output).EndInit();
            ResumeLayout(false);
            PerformLayout();
        }

        #endregion

        private Button btn_Run;
        private Button btn_Clear;
        private PictureBox btn_Output;
        private TextBox btn_Cmd;
        private TextBox btn_ConsolePnl;
        private Button btn_Reset;
        private TextBox textBox1;
        private TextBox textBox2;
        private TextBox textBox3;
    }
}
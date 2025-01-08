using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using BOOSE;


namespace Component_1
{
    /// <summary>
    /// A custom command factory that extends the BOOSE
    /// Support additional commands like "tri","write".
    /// </summary>
    /// <seealso cref="BOOSE.CommandFactory" />
    public class CustomCommandFactory : CommandFactory
    {
        private readonly ICanvas _canvas;

        /// <summary>
        /// Initializes a new instance of the <see cref="CustomCommandFactory"/> class.
        /// </summary>
        /// <param name="canvas">The <see cref="ICanvas"/>object associate with custom commands</param>
        public CustomCommandFactory(ICanvas canvas)
        {
            _canvas = canvas;
        }

        /// <summary>
        /// Makes the new BOOSE command.
        /// </summary>
        /// <param name="commandType">Type of the command to create.</param>
        /// <returns>An <see cref="ICommand"/> instance corresponding to the specified command type.</returns>
        /// <exception cref="FactoryException">
        /// Thrown when an unsupported command type is requested.
        /// </exception>
        public override ICommand MakeCommand(string commandType)
        {
            commandType = commandType.ToLower();

            switch (commandType)
            {
                case "tri":
                    return new Tri(_canvas);
                case "circle":
                    return new CustomCircle(_canvas);
                case "rect":
                    return new CustomRect(_canvas);
                case "write":
                    return new CustomWrite(_canvas);
                case "int":
                    return new CustomInt();
                default:
                    return base.MakeCommand(commandType);
            }
        }
    }
}
